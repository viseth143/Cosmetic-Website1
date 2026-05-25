@extends('layouts.app')

@section('content')

<!-- CHECKOUT HEADER -->
<section class="bg-pink-100 py-16">

    <div class="container mx-auto px-6 text-center">

        <h1 class="text-5xl font-bold text-pink-600 mb-4">
            Checkout
        </h1>

        <p class="text-lg text-gray-700">
            Complete your skincare order
        </p>

    </div>

</section>

<!-- CHECKOUT CONTENT -->
<section class="bg-pink-50 py-16 min-h-screen">

    <div class="container mx-auto px-6">

        <div class="grid lg:grid-cols-3 gap-10">

            <!-- BILLING FORM -->
            <div class="lg:col-span-2 bg-white rounded-3xl shadow-lg p-10">

                <h2 class="text-3xl font-bold mb-8">
                    Billing Details
                </h2>

                <form>

                    <!-- NAME -->
                    <div class="grid md:grid-cols-2 gap-6 mb-6">

                        <div>

                            <label class="block mb-2 font-semibold">
                                First Name
                            </label>

                            <input type="text" placeholder="Enter first name"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">

                        </div>

                        <div>

                            <label class="block mb-2 font-semibold">
                                Last Name
                            </label>

                            <input type="text" placeholder="Enter last name"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">

                        </div>

                    </div>

                    <!-- EMAIL -->
                    <div class="mb-6">

                        <label class="block mb-2 font-semibold">
                            Email Address
                        </label>

                        <input type="email" placeholder="Enter email"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">

                    </div>

                    <!-- PHONE -->
                    <div class="mb-6">

                        <label class="block mb-2 font-semibold">
                            Phone Number
                        </label>

                        <input type="text" placeholder="Enter phone number"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">

                    </div>

                    <!-- ADDRESS -->
                    <div class="mb-6">

                        <label class="block mb-2 font-semibold">
                            Address
                        </label>

                        <input type="text" placeholder="Street address"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">

                    </div>

                    <!-- CITY -->
                    <div class="grid md:grid-cols-2 gap-6 mb-6">

                        <div>

                            <label class="block mb-2 font-semibold">
                                City
                            </label>

                            <input type="text" placeholder="Enter city"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">

                        </div>

                        <div>

                            <label class="block mb-2 font-semibold">
                                Postal Code
                            </label>
                            <input type="text" placeholder="Postal code"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">

                        </div>

                    </div>

                    <!-- PAYMENT -->
                    <div class="mb-8">

                        <label class="block mb-4 font-semibold text-xl">
                            Payment Method
                        </label>

                        <div class="space-y-4">

                            <label class="flex items-center gap-3">

                                <input type="radio" name="payment">

                                <span>
                                    Credit / Debit Card
                                </span>

                            </label>

                            <label class="flex items-center gap-3">

                                <input type="radio" name="payment">

                                <span>
                                    ABA Pay
                                </span>

                            </label>

                            <label class="flex items-center gap-3">

                                <input type="radio" name="payment">

                                <span>
                                    Cash on Delivery
                                </span>

                            </label>

                        </div>

                    </div>

                    <!-- PLACE ORDER -->
                    <button type="submit"
                        class="w-full bg-pink-500 hover:bg-pink-600 text-white py-4 rounded-2xl text-lg font-semibold">

                        Place Order

                    </button>

                </form>

            </div>

            <!-- ORDER SUMMARY -->
            <div class="bg-white rounded-3xl shadow-lg p-8 h-fit">

                <h2 class="text-3xl font-bold mb-8">
                    Order Summary
                </h2>

                <!-- PRODUCT -->
                <div class="flex justify-between items-center mb-6">

                    <div>

                        <h3 class="font-bold">
                            Vitamin C Serum
                        </h3>

                        <p class="text-gray-500">
                            Qty: 1
                        </p>

                    </div>

                    <span class="font-bold">
                        $25
                    </span>

                </div>

                <!-- PRODUCT -->
                <div class="flex justify-between items-center mb-6">

                    <div>

                        <h3 class="font-bold">
                            Hydrating Cleanser
                        </h3>

                        <p class="text-gray-500">
                            Qty: 2
                        </p>

                    </div>

                    <span class="font-bold">
                        $36
                    </span>

                </div>

                <!-- TOTAL -->
                <div class="border-t pt-6 space-y-4">

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
                    <div class="flex justify-between text-2xl font-bold">

                        <span>
                            Total
                        </span>
                        <span class="text-pink-500">
                            $66
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection