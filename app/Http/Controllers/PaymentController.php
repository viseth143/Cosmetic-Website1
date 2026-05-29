<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index()
    {
        $customerId = Session::get('customer_id');

        if ($customerId) {
            $cart = Cart::where('customer_id', $customerId)->first();
        } else {
            $cartId = session('cart_id');
            $cart   = $cartId ? Cart::find($cartId) : null;
        }

        $cartItems = $cart
            ? CartItem::with('product.images')->where('cart_id', $cart->cart_id)->get()
            : collect();

        $subtotal = $cartItems->sum(fn($item) => $item->price * $item->quantity);
        $shipping = $subtotal > 50 ? 0 : 5;
        $total    = Session::get('order_total') ?? ($subtotal + $shipping);

        return view('payment', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }

    public function success(Request $request)
    {
        $orderId = Session::get('order_id');

        if ($request->hasFile('payment_screenshot') && $orderId) {
            $file     = $request->file('payment_screenshot');
            $fileName = time() . '_receipt_' . $file->getClientOriginalName();
            $file->move(public_path('receipts'), $fileName);

            Order::where('order_id', $orderId)->update([
                'status'        => 'pending review',
                'receipt_image' => 'receipts/' . $fileName,
            ]);
        } elseif ($orderId) {
            Order::where('order_id', $orderId)->update(['status' => 'pending review']);
        }

        $customerId = Session::get('customer_id');
        if ($customerId) {
            $cart = Cart::where('customer_id', $customerId)->first();
            if ($cart) CartItem::where('cart_id', $cart->cart_id)->delete();
        } elseif (session('cart_id')) {
            $cart = Cart::find(session('cart_id'));
            if ($cart) CartItem::where('cart_id', $cart->cart_id)->delete();
            session()->forget('cart_id');
        }

        Session::forget(['order_id', 'order_total', 'checkout_data']);

        return view('order-success');
    }
}
