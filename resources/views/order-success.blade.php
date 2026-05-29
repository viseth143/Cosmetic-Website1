@extends('layouts.app')

@section('content')

<section class="bg-pink-50 min-h-screen flex items-center justify-center py-16">
    <div class="bg-white rounded-3xl shadow-lg p-12 max-w-lg w-full text-center">

        <div class="text-7xl mb-6">🎉</div>

        <h1 class="text-4xl font-bold text-pink-500 mb-4">Order Confirmed!</h1>
        <p class="text-gray-600 mb-2">
            Thank you for shopping at <span class="text-pink-500 font-bold">Magic Shop</span>!
        </p>
        <p class="text-gray-500 mb-8">
            Your order has been placed successfully. We'll contact you soon.
        </p>

        <div class="bg-pink-50 rounded-2xl p-6 mb-8 text-left space-y-3">
            <div class="flex justify-between">
                <span class="text-gray-500">Status</span>
                <span class="text-yellow-500 font-bold">⏳ Pending Review</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Delivery</span>
                <span class="font-bold text-gray-700">3-5 Business Days</span>
            </div>
        </div>

        <a href="{{ route('my.orders') }}"
            class="block w-full bg-pink-500 hover:bg-pink-600 text-white py-4 rounded-2xl text-lg font-semibold transition mb-3">
            📦 Track My Order
        </a>
        <a href="{{ route('shop') }}"
            class="block w-full border-2 border-pink-500 text-pink-500 hover:bg-pink-50 py-4 rounded-2xl text-lg font-semibold transition mb-3">
            Continue Shopping
        </a>
        <a href="{{ route('home') }}"
            class="block w-full border-2 border-gray-200 text-gray-500 hover:bg-gray-50 py-4 rounded-2xl text-lg font-semibold transition">
            Back to Home
        </a>

    </div>
</section>

@endsection
