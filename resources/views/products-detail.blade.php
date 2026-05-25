@extends('layouts.app')

@section('content')

<!-- PRODUCT DETAIL -->
<section class="bg-pink-50 py-16 min-h-screen">

    <div class="container mx-auto px-6">

        <div class="grid md:grid-cols-2 gap-12 bg-white rounded-3xl shadow-lg p-10">

            <!-- PRODUCT IMAGE -->
            <div>

                <img src="https://via.placeholder.com/600x600"
                     alt="Product Image"
                     class="w-full rounded-3xl shadow-md">

            </div>

            <!-- PRODUCT INFO -->
            <div>

                <!-- BRAND -->
                <p class="text-pink-500 font-semibold text-lg mb-2">
                    The Ordinary
                </p>

                <!-- PRODUCT NAME -->
                <h1 class="text-5xl font-bold text-gray-800 mb-6">
                    Niacinamide 10% + Zinc 1%
                </h1>

                <!-- PRICE -->
                <div class="flex items-center gap-4 mb-6">

                    <span class="text-4xl font-bold text-pink-500">
                        $25
                    </span>

                    <span class="line-through text-gray-400 text-xl">
                        $30
                    </span>

                </div>

                <!-- DESCRIPTION -->
                <p class="text-gray-600 leading-8 mb-8">

                    This serum helps reduce blemishes, minimize pores,
                    and improve skin texture while controlling excess oil.
                    Suitable for all skin types.

                </p>

                <!-- PRODUCT DETAILS -->
                <div class="space-y-4 mb-8">

                    <div class="flex gap-3">

                        <span class="font-bold">
                            Category:
                        </span>

                        <span class="text-gray-600">
                            Serum
                        </span>

                    </div>

                    <div class="flex gap-3">

                        <span class="font-bold">
                            Skin Type:
                        </span>

                        <span class="text-gray-600">
                            Oily, Combination
                        </span>

                    </div>

                    <div class="flex gap-3">

                        <span class="font-bold">
                            Stock:
                        </span>

                        <span class="text-green-500 font-semibold">
                            In Stock
                        </span>

                    </div>

                </div>

                <!-- QUANTITY -->
                <div class="flex items-center gap-4 mb-8">

                    <span class="font-bold text-lg">
                        Quantity:
                    </span>

                    <div class="flex items-center border rounded-xl overflow-hidden">

                        <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200">
                            -
                        </button>

                        <span class="px-6 py-2">
                            1
                        </span>

                        <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200">
                            +
                        </button>

                    </div>

                </div>

                <!-- BUTTONS -->
                <div class="flex flex-wrap gap-4">

                    <a href="{{ route('cart') }}"
                       class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-4 rounded-2xl text-lg font-semibold">

                        Add to Cart

                    </a>

                    <button class="border-2 border-pink-500 text-pink-500 hover:bg-pink-500 hover:text-white px-8 py-4 rounded-2xl text-lg font-semibold">

                        Buy Now

                    </button>

                </div>

            </div>

        </div>

        <!-- RELATED PRODUCTS -->
        <div class="mt-20">
            <h2 class="text-4xl font-bold text-center mb-12">
                Related Products
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

                <!-- PRODUCT CARD -->
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

                    <img src="https://via.placeholder.com/400x300"
                         class="w-full">

                    <div class="p-6">

                        <h3 class="text-2xl font-bold mb-3">
                            Hydrating Cleanser
                        </h3>

                        <p class="text-gray-600 mb-4">
                            Gentle daily facial cleanser.
                        </p>

                        <div class="flex justify-between items-center">

                            <span class="text-pink-500 text-2xl font-bold">
                                $18
                            </span>

                            <button class="bg-pink-500 hover:bg-pink-600 text-white px-5 py-2 rounded-xl">

                                View

                            </button>

                        </div>

                    </div>

                </div>

                <!-- PRODUCT CARD -->
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

                    <img src="https://via.placeholder.com/400x300"
                         class="w-full">

                    <div class="p-6">

                        <h3 class="text-2xl font-bold mb-3">
                            Sunscreen SPF50
                        </h3>

                        <p class="text-gray-600 mb-4">
                            Protect your skin from UV rays.
                        </p>

                        <div class="flex justify-between items-center">

                            <span class="text-pink-500 text-2xl font-bold">
                                $22
                            </span>

                            <button class="bg-pink-500 hover:bg-pink-600 text-white px-5 py-2 rounded-xl">

                                View

                            </button>

                        </div>

                    </div>

                </div>

                <!-- PRODUCT CARD -->
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

                    <img src="https://via.placeholder.com/400x300"
                         class="w-full">

                    <div class="p-6">

                        <h3 class="text-2xl font-bold mb-3">
                            Moisturizer Cream
                        </h3>

                        <p class="text-gray-600 mb-4">
                            Soft and smooth moisturizing cream.
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-pink-500 text-2xl font-bold">
                                $30
                            </span>
                            <button class="bg-pink-500 hover:bg-pink-600 text-white px-5 py-2 rounded-xl">
                                View
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection