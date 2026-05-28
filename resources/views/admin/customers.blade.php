
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
                    <th>Joined</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                <tr class="border-b hover:bg-pink-50 transition">
                    <td class="py-4">{{ $customer->customer_id }}</td>
                    <td>{{ $customer->customer_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->created_at ? $customer->created_at->format('d M Y') : '—' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-400">No customers yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
