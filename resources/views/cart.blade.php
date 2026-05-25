@extends('layouts.app')

@section('content')

<!-- PAGE HEADER -->
<section class="bg-pink-100 py-16">

    <div class="container mx-auto px-6 text-center">

        <h1 class="text-5xl font-bold text-pink-600 mb-4">
            Shopping Cart
        </h1>

        <p class="text-lg text-gray-700">
            Review your skincare products
        </p>

    </div>

</section>

<!-- CART SECTION -->
<section class="py-16 bg-pink-50 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-10">
            <!-- CART ITEMS -->
            <div class="lg:col-span-2 bg-white rounded-3xl shadow-lg p-8">
                <h2 class="text-3xl font-bold mb-8">
                    Cart Items
                </h2>
                <!-- ITEM -->
                <div class="flex flex-col md:flex-row items-center justify-between border-b pb-6 mb-6">
                    <div class="flex items-center gap-6">
                        <img src="https://via.placeholder.com/120" class="rounded-2xl">
                        <div>
                            <h3 class="text-2xl font-bold mb-2">
                                Vitamin C Serum
                            </h3>
                            <p class="text-gray-500 mb-2">
                                Brightening skincare serum
                            </p>
                            <span class="text-pink-500 font-bold text-xl">
                                $25
                            </span>
                        </div>
                    </div>
                    <!-- QUANTITY -->
                    <div class="flex items-center gap-4 mt-5 md:mt-0">
                        <button class="bg-gray-200 px-4 py-2 rounded-lg">
                            -
                        </button>
                        <span class="text-xl font-bold">
                            1
                        </span>
                        <button class="bg-gray-200 px-4 py-2 rounded-lg">
                            +
                        </button>
                    </div>
                </div>
                <!-- ITEM -->
                <div class="flex flex-col md:flex-row items-center justify-between border-b pb-6 mb-6">
                    <div class="flex items-center gap-6">
                        <img src="https://via.placeholder.com/120" class="rounded-2xl">
                        <div>
                            <h3 class="text-2xl font-bold mb-2">
                                Hydrating Cleanser
                            </h3>
                            <p class="text-gray-500 mb-2">
                                Gentle cleanser for daily use
                            </p>
                            <span class="text-pink-500 font-bold text-xl">
                                $18
                            </span>
                        </div>
                    </div>
                    <!-- QUANTITY -->
                    <div class="flex items-center gap-4 mt-5 md:mt-0">

                        <button class="bg-gray-200 px-4 py-2 rounded-lg">
                            -
                        </button>

                        <span class="text-xl font-bold">
                            2
                        </span>

                        <button class="bg-gray-200 px-4 py-2 rounded-lg">
                            +
                        </button>

                    </div>

                </div>

                <!-- CONTINUE SHOPPING -->
                <a href="{{ route('shop') }}"
                    class="inline-block mt-4 bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-full">
                    Continue Shopping
                </a>
            </div>
            <!-- ORDER SUMMARY -->
            <div class="bg-white rounded-3xl shadow-lg p-8 h-fit">
                <h2 class="text-3xl font-bold mb-8">
                    Order Summary
                </h2>
                <div class="space-y-5">
                    <div class="flex justify-between">
                        <span class="text-gray-600">
                            Subtotal
                        </span>
                        <span class="font-bold">
                            $61
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">
                            Shipping
                        </span>
                        <span class="font-bold">
                            $5
                        </span>
                    </div>
                    <div class="border-t pt-5 flex justify-between text-2xl font-bold">
                        <span>
                            Total
                        </span>
                        <span class="text-pink-500">
                            $66
                        </span>
                    </div>
                </div>
                <!-- CHECKOUT BUTTON -->
                <a href="{{ route('checkout') }}"
                    class="block text-center w-full mt-8 bg-pink-500 hover:bg-pink-600 text-white py-4 rounded-2xl text-lg font-semibold">
                    Proceed to Checkout
                </a>

            </div>
        </div>
    </div>
</section>
@endsection