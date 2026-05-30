@php
// Get cart count matching the CartController logic
$cartCount = 0;
$customerId = Session::get('customer_id');

if ($customerId) {
// If user is logged in, find their active cart record using customer_id
$cart = \App\Models\Cart::where('customer_id', $customerId)->first();
if ($cart) {
$cartCount = \App\Models\CartItem::where('cart_id', $cart->cart_id)->sum('quantity');
}
} else {
// If guest user, check using the session's cart_id
$cartId = session('cart_id');
if ($cartId) {
$cartCount = \App\Models\CartItem::where('cart_id', $cartId)->sum('quantity');
}
}
@endphp

<nav class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-pink-500">Magic Shop</h1>

        <ul class="flex gap-6 font-medium">
            <li><a href="{{ route('home') }}" class="hover:text-pink-500">Home</a></li>
            <li><a href="{{ route('shop') }}" class="hover:text-pink-500">Shop All</a></li>
            <li><a href="{{ route('brand') }}" class="hover:text-pink-500">Brand</a></li>
            <li><a href="{{ route('about') }}" class="hover:text-pink-500">About</a></li>
            <li><a href="{{ route('contact') }}" class="hover:text-pink-500">Contact</a></li>
        </ul>

        <div class="flex gap-6 font-medium items-center">

            {{-- Cart with badge --}}
            <a href="{{ route('cart') }}" class="relative hover:text-pink-500 mr-2">
                <i class="fa-solid fa-cart-shopping text-xl"></i>
                @if($cartCount > 0)
                <span class="absolute -top-2 -right-2 bg-pink-500 text-white text-xs font-bold
                             w-5 h-5 rounded-full flex items-center justify-center">
                    {{ $cartCount > 99 ? '99+' : $cartCount }}
                </span>
                @endif
            </a>

            {{-- User Authentication Section --}}
            @if(Session::get('customer_id') || Session::get('is_admin'))

            {{-- NEW: Show 'My Orders' tracking link if they are logged in as a normal customer --}}
            @if(Session::get('customer_id'))
            <a href="{{ route('my.orders') }}"
                class="text-gray-600 hover:text-pink-500 flex items-center gap-1 text-sm font-semibold transition">
                <i class="fa-solid fa-box-open"></i> My Orders
            </a>
            @endif

            <span class="text-pink-500 font-semibold">
                👋 {{ Session::get('customer_name') ?? Session::get('admin_name') ?? 'seth' }}
            </span>

            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="hover:text-pink-500 text-red-500 font-semibold">
                    Logout
                </button>
            </form>
            @else
            <a href="{{ route('login') }}" class="hover:text-pink-500">
                <i class="fa-solid fa-user"></i> Login
            </a>
            @endif

        </div>
    </div>
</nav>