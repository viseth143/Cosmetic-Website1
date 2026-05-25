
@extends('layouts.admin')
@section('content')
<section class="p-10 bg-pink-50 min-h-screen">
    <div class="bg-white rounded-3xl shadow-lg p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-pink-500">
                Brands
            </h1>
            <button class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-xl">
                Add Brand
            </button>
        </div>
        <table class="w-full text-left">
            <thead>
                <tr class="border-b">
                    <th class="py-4">Logo</th>
                    <th>Brand Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="py-4">
                        <img src="https://via.placeholder.com/60"
                             class="rounded-full">
                    </td>
                    <td>CeraVe</td>
                    <td>Dermatologist-developed skincare products.</td>
                    <td class="space-x-2">
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
</section>
@endsection

