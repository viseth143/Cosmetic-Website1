<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductOptionValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private function getOrCreateCart()
    {
        $customerId = Session::get('customer_id');

        if ($customerId) {
            return Cart::firstOrCreate(['customer_id' => $customerId]);
        }

        $cartId = session('cart_id');
        if ($cartId) {
            $cart = Cart::find($cartId);
            if ($cart) return $cart;
        }

        $cart = Cart::create(['customer_id' => null]);
        session(['cart_id' => $cart->cart_id]);
        return $cart;
    }

    public function index()
    {
        $cart      = $this->getOrCreateCart();
        $cartItems = CartItem::with('product.images')
                             ->where('cart_id', $cart->cart_id)
                             ->get();

        $subtotal = $cartItems->sum(fn($item) => $item->price * $item->quantity);
        $shipping = $subtotal > 50 ? 0 : 5;
        $total    = $subtotal + $shipping;

        return view('cart', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }

    public function add(Request $request)
    {
        if (Session::get('is_admin')) {
            return redirect()->back()->with('error', 'Admins cannot add items to cart.');
        }

        $request->validate([
            'product_id' => 'required|exists:Products,product_id',
            'quantity'   => 'integer|min:1',
        ]);

        $product  = Product::findOrFail($request->product_id);
        $cart     = $this->getOrCreateCart();
        $quantity = $request->quantity ?? 1;

        // Build selected option label from submitted option values
        $selectedOption = null;
        $optionInputs   = array_filter($request->all(), fn($key) => str_starts_with($key, 'option_'), ARRAY_FILTER_USE_KEY);

        if (!empty($optionInputs)) {
            $labels = [];
            foreach ($optionInputs as $valueId) {
                $val = ProductOptionValue::find($valueId);
                if ($val) $labels[] = $val->option_value;
            }
            $selectedOption = implode(', ', $labels);
        }

        $item = CartItem::where('cart_id', $cart->cart_id)
                        ->where('product_id', $request->product_id)
                        ->where('selected_option', $selectedOption)
                        ->first();

        if ($item) {
            $item->increment('quantity', $quantity);
        } else {
            CartItem::create([
                'cart_id'         => $cart->cart_id,
                'product_id'      => $request->product_id,
                'quantity'        => $quantity,
                'price'           => $product->price,
                'selected_option' => $selectedOption,
            ]);
        }

        return redirect()->back()->with('success', '🛒 Item added to cart!');
    }

    public function remove($id)
    {
        CartItem::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        CartItem::findOrFail($id)->update(['quantity' => $request->quantity]);
        return redirect()->back();
    }
}
