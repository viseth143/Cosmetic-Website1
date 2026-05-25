@extends('layouts.admin')
@section('content')
<div class="min-h-screen bg-pink-50 flex">
    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8">
        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-4xl font-bold text-gray-800">
                    Dashboard
                </h2>
                <p class="text-gray-500">
                    Welcome back, Admin
                </p>
            </div>
        </div>

        <!-- STATISTICS -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- CARD -->
            <div class="bg-white p-6 rounded-3xl shadow-lg">
                <h3 class="text-gray-500 mb-2">
                    Total Products
                </h3>
                <h2 class="text-4xl font-bold text-pink-500">
                    120
                </h2>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-lg">
                <h3 class="text-gray-500 mb-2">
                    Brands
                </h3>
                <h2 class="text-4xl font-bold text-pink-500">
                    15
                </h2>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-lg">
                <h3 class="text-gray-500 mb-2">
                    Orders
                </h3>
                <h2 class="text-4xl font-bold text-pink-500">
                    320
                </h2>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-lg">
                <h3 class="text-gray-500 mb-2">
                    Customers
                </h3>
                <h2 class="text-4xl font-bold text-pink-500">
                    95
                </h2>
            </div>
        </div>

        <!-- PRODUCT TABLE -->
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
            <div class="p-6 border-b">

                <h3 class="text-2xl font-bold">
                    Recent Products
                </h3>
            </div>
            <table class="w-full">
                <thead class="bg-pink-100">
                    <tr>
                        <th class="text-left p-4">
                            Product
                        </th>
                        <th class="text-left p-4">
                            Brand
                        </th>
                        <th class="text-left p-4">
                            Price
                        </th>
                        <th class="text-left p-4">
                            Stock
                        </th>
                        <th class="text-left p-4">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">

                        <td class="p-4">
                            Vitamin C Serum
                        </td>
                        <td class="p-4">
                            The Ordinary
                        </td>
                        <td class="p-4">
                            $25
                        </td>
                        <td class="p-4">
                            30
                        </td>
                        <td class="p-4 space-x-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                                Edit
                            </button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded-lg">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-4">
                            Sunscreen SPF50
                        </td>
                        <td class="p-4">
                            COSRX
                        </td>
                        <td class="p-4">
                            $22
                        </td>
                        <td class="p-4">
                            15
                        </td>
                        <td class="p-4 space-x-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                                Edit
                            </button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded-lg">
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection