@extends('layouts.admin')

@section('content')

<section class="bg-pink-50 min-h-screen py-10">

    <div class="container mx-auto px-6">
        <!-- PAGE HEADER -->
        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-4xl font-bold text-pink-500 mb-2">
                    Add Product
                </h1>
                <p class="text-gray-600">
                    Add new skincare product to your store
                </p>
            </div>
            <a href="{{ url('/admin/products') }}" class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-xl">
                Back
            </a>
        </div>
        <!-- FORM -->
        <div class="bg-white rounded-3xl shadow-lg p-10">
            <form>
                <!-- PRODUCT NAME -->
                <div class="mb-6">
                    <label class="block mb-2 font-semibold text-lg">
                        Product Name
                    </label>
                    <input type="text" placeholder="Enter product name"
                        class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-pink-400">
                </div>
                <!-- BRAND & CATEGORY -->
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <!-- BRAND -->
                    <div>
                        <label class="block mb-2 font-semibold text-lg">
                            Brand
                        </label>
                        <select
                            class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-pink-400">
                            <option>Select Brand</option>
                            <option>CeraVe</option>
                            <option>The Ordinary</option>
                            <option>COSRX</option>
                            <option>La Roche-Posay</option>
                        </select>
                    </div>
                    <!-- CATEGORY -->
                    <div>
                        <label class="block mb-2 font-semibold text-lg">
                            Category
                        </label>
                        <select
                            class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-pink-400">
                            <option>Select Category</option>
                            <option>Cleanser</option>
                            <option>Serum</option>
                            <option>Moisturizer</option>
                            <option>Sunscreen</option>
                        </select>
                    </div>
                </div>
                <!-- PRICE & STOCK -->
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <!-- PRICE -->
                    <div>
                        <label class="block mb-2 font-semibold text-lg">
                            Price
                        </label>
                        <input type="number" placeholder="$0.00"
                            class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-pink-400">
                    </div>
                    <!-- STOCK -->
                    <div>
                        <label class="block mb-2 font-semibold text-lg">
                            Stock Quantity
                        </label>
                        <input type="number" placeholder="0"
                            class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-pink-400">
                    </div>
                </div>
                <!-- IMAGE -->
                <div class="mb-6">
                    <label class="block mb-2 font-semibold text-lg">
                        Product Image
                    </label>
                    <input type="file" class="w-full border border-gray-300 rounded-2xl px-5 py-4 bg-white">
                </div>
                <!-- DESCRIPTION -->
                <div class="mb-8">
                    <label class="block mb-2 font-semibold text-lg">
                        Description
                    </label>
                    <textarea rows="6" placeholder="Enter product description"
                        class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-pink-400"></textarea>
                </div>
                <!-- BUTTONS -->
                <div class="flex gap-4">
                    <button type="submit"
                        class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-4 rounded-2xl text-lg font-semibold">
                        Save Product
                    </button>
                    <button type="reset"
                        class="bg-gray-200 hover:bg-gray-300 px-8 py-4 rounded-2xl text-lg font-semibold">
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection