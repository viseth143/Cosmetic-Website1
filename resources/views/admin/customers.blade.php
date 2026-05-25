
@extends('layouts.admin')
@section('content')
<section class="p-10 bg-pink-50 min-h-screen">
    <div class="bg-white rounded-3xl shadow-lg p-8">
        <h1 class="text-4xl font-bold text-pink-500 mb-8">
            Customers
        </h1>
        <table class="w-full text-left">
            <thead>
                <tr class="border-b">
                    <th class="py-4">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="py-4">1</td>
                    <td>John Doe</td>
                    <td>john@example.com</td>
                    <td>012345678</td>
                    <td>
                        <span class="bg-green-100 text-green-600 px-4 py-1 rounded-full">
                            Active
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection

