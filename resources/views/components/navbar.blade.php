<nav class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-pink-500">
            Magic Shop
        </h1>
        <ul class="flex gap-6 font-medium">
            <li><a href="{{ route('home') }}" class="hover:text-pink-500">Home</a></li>
            <li><a href="{{ route('shop') }}" class="hover:text-pink-500">Shop All</a></li>
            <li><a href="{{ route('brand') }}" class="hover:text-pink-500">Brand</a></li>
            <li><a href="{{ route('about') }}" class="hover:text-pink-500">About</a></li>
            <li><a href="{{ route('contact') }}" class="hover:text-pink-500">Contact</a></li>
        </ul>
        <div class="flex gap-6 font-medium">
            <a href="{{ route('cart') }}" class="hover:text-pink-500"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="{{ route('login') }}" class="hover:text-pink-500"><i class="fa-solid fa-user">   Login</i></a>
        </div>
    </div>
</nav>
