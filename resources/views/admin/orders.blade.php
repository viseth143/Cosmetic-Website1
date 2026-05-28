
@extends('layouts.admin')
@section('content')
<section class="p-10 bg-pink-50 min-h-screen">

    <div class="bg-white rounded-3xl shadow-lg p-8">
        <h1 class="text-4xl font-bold text-pink-500 mb-8">
            Orders
        </h1>

        @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6">{{ session('success') }}</div>
        @endif

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
                @forelse($orders as $order)
                <tr class="border-b hover:bg-pink-50 transition">
                    <td class="py-4">#{{ $order->order_id }}</td>
                    <td>{{ $order->customer->customer_name ?? 'Guest' }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>${{ number_format($order->total_amount, 2) }}</td>
                    <td>
                        @php
                            $statusColors = [
                                'pending'   => 'bg-yellow-100 text-yellow-600',
                                'paid'      => 'bg-green-100 text-green-600',
                                'cancelled' => 'bg-red-100 text-red-600',
                            ];
                            $color = $statusColors[$order->status] ?? 'bg-gray-100 text-gray-600';
                        @endphp
                        <span class="{{ $color }} px-4 py-1 rounded-full capitalize">
                            {{ $order->status }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-400">No orders yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
