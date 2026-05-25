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

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/pka_lipstick.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Vitamin C Serum
                    </h2>

                    <p class="text-gray-600 mb-3">
                        Brightening skincare serum.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $25
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/pka_lipstick.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Hydrating Cleanser
                    </h2>

                    <p class="text-gray-600 mb-3">
                        Gentle cleanser for daily use.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $18
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/pka_lipstick.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Moisturizer Cream
                    </h2>

                    <p class="text-gray-600 mb-3">
                        Keeps your skin smooth and soft.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $30
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/lipstick.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Sunscreen SPF50
                    </h2>
                    <p class="text-gray-600 mb-3">
                        Protect your skin from UV rays.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $22
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container mx-auto px-6 mt-10">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/pka_powder.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Vitamin C Serum
                    </h2>

                    <p class="text-gray-600 mb-3">
                        Brightening skincare serum.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $25
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/pka_powder.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Hydrating Cleanser
                    </h2>

                    <p class="text-gray-600 mb-3">
                        Gentle cleanser for daily use.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $18
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/pka_powder.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Moisturizer Cream
                    </h2>

                    <p class="text-gray-600 mb-3">
                        Keeps your skin smooth and soft.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $30
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/lipstick.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Sunscreen SPF50
                    </h2>
                    <p class="text-gray-600 mb-3">
                        Protect your skin from UV rays.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $22
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container mx-auto px-6 mt-10">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/pka_powder.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Vitamin C Serum
                    </h2>

                    <p class="text-gray-600 mb-3">
                        Brightening skincare serum.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $25
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/pka_powder.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Hydrating Cleanser
                    </h2>

                    <p class="text-gray-600 mb-3">
                        Gentle cleanser for daily use.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $18
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/pka_powder.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Moisturizer Cream
                    </h2>

                    <p class="text-gray-600 mb-3">
                        Keeps your skin smooth and soft.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $30
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/lipstick.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Sunscreen SPF50
                    </h2>
                    <p class="text-gray-600 mb-3">
                        Protect your skin from UV rays.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $22
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container mx-auto px-6 mt-10">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/pka_powder.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Vitamin C Serum
                    </h2>

                    <p class="text-gray-600 mb-3">
                        Brightening skincare serum.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $25
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/pka_powder.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Hydrating Cleanser
                    </h2>

                    <p class="text-gray-600 mb-3">
                        Gentle cleanser for daily use.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $18
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/pka_powder.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Moisturizer Cream
                    </h2>

                    <p class="text-gray-600 mb-3">
                        Keeps your skin smooth and soft.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $30
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

            <!-- PRODUCT CARD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                <img src="{{ asset('images/lipstick.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center bg-white" />

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-2">
                        Sunscreen SPF50
                    </h2>
                    <p class="text-gray-600 mb-3">
                        Protect your skin from UV rays.
                    </p>

                    <div class="flex justify-between items-center">

                        <span class="text-pink-500 font-bold text-lg">
                            $22
                        </span>

                        <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
