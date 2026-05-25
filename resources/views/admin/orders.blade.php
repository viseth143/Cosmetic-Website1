
@extends('layouts.admin')
@section('content')
<section class="p-10 bg-pink-50 min-h-screen">

    <div class="bg-white rounded-3xl shadow-lg p-8">
        <h1 class="text-4xl font-bold text-pink-500 mb-8">
            Orders
        </h1>
        <table class="w-full text-left">
            <thead>
                <tr class="border-b">
                    <th class="py-4">Order ID</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="py-4">#1001</td>
                    <td>John Doe</td>
                    <td>25 May 2026</td>
                    <td>$120</td>
                    <td>
                        <span class="bg-yellow-100 text-yellow-600 px-4 py-1 rounded-full">
                            Pending
                        </span>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="py-4">#1002</td>
                    <td>Sarah Smith</td>
                    <td>24 May 2026</td>
                    <td>$80</td>
                    <td>
                        <span class="bg-green-100 text-green-600 px-4 py-1 rounded-full">
                            Completed
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection

