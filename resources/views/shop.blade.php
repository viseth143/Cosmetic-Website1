@extends('layouts.app')

@section('content')

<!-- PAGE TITLE -->
<section class="bg-pink-100 py-16">
    <div class="container mx-auto px-6 text-center">

        <h1 class="text-5xl font-bold text-pink-600 mb-4">
            Shop All Products
        </h1>

        <p class="text-gray-700 text-lg">
            Discover our skincare collection
        </p>

    </div>
</section>

<!-- PRODUCTS -->
<section class="py-16">
    <div class="container mx-auto px-6">
             <!-- PRODUCT CARD -->
        <a href="{{ route('product.detail')}}"
   class="block relative w-[250px] h-[340px] rounded-[20px] overflow-hidden shadow-lg group hover:shadow-2xl transition duration-300">

    <!-- Product Image -->
    <img src="{{ asset('images/pka_powder.jpg') }}"
        alt="Velvet Matte Lipstick"
        class="w-full h-full object-cover group-hover:scale-105 transition duration-300" />

    <!-- Dark Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

    <!-- Content -->
    <div class="absolute bottom-0 left-0 w-full p-4 text-white">

        <div class="mt-10">

            <!-- Product Name -->
            <h2 class="text-md font-bold leading-none">
                Product Name
            </h2>

            <!-- Subtitle -->
            <p class="text-sm text-white/90 mt-1">
                serhguihuierhgm
            </p>

            <!-- Bottom Row -->
            <div class="flex items-center justify-between mt-6">

                <!-- Price -->
                <span class="text-md font-medium">
                    14$
                </span>

                <!-- Button -->
                <button
                    class="bg-pink-500 hover:bg-pink-600 text-sm text-white px-5 py-2 rounded-full">
                    Add to Cart
                </button>

            </div>
        </div>
    </div>
</a>
    </div>
</section>

@endsection
