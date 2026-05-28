<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    private function getCart()
    {
        $customerId = Session::get('customer_id');

        if ($customerId) {
            return Cart::where('customer_id', $customerId)->first();
        }

        $cartId = session('cart_id');
        return $cartId ? Cart::find($cartId) : null;
    }

    public function index()
    {
        $cart = $this->getCart();

        $cartItems = $cart
            ? CartItem::with('product.images')->where('cart_id', $cart->cart_id)->get()
            : collect();

        $subtotal = $cartItems->sum(fn($item) => $item->price * $item->quantity);
        $shipping = $subtotal > 50 ? 0 : 5;
        $total    = $subtotal + $shipping;

        return view('checkout', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'     => 'required|string|max:100',
            'last_name'      => 'required|string|max:100',
            'email'          => 'required|email',
            'phone'          => 'required|string|max:20',
            'address'        => 'required|string|max:255',
            'city'           => 'required|string|max:100',
            'postal_code'    => 'required|string|max:20',
            'payment_method' => 'required|in:card,aba,cod',
        ]);

        $cart = $this->getCart();
        $cartItems = $cart
            ? CartItem::with('product')->where('cart_id', $cart->cart_id)->get()
            : collect();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $subtotal = $cartItems->sum(fn($item) => $item->price * $item->quantity);
        $shipping = $subtotal > 50 ? 0 : 5;
        $total    = $subtotal + $shipping;

        // Create order
        $order = Order::create([
            'customer_id'  => Session::get('customer_id'),
            'ZipNumber'    => $request->postal_code,
            'total_amount' => $total,
            'status'       => 'pending',
        ]);

        // Create order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'   => $order->order_id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->price,
                'total'      => $item->price * $item->quantity,
            ]);
        }

        // Store order info in session for payment page
        Session::put('order_id', $order->order_id);
        Session::put('order_total', $total);
        Session::put('checkout_data', $request->only(
            'first_name', 'last_name', 'email', 'phone', 'address', 'city', 'postal_code', 'payment_method'
        ));

        return redirect()->route('payment');
    }
}
