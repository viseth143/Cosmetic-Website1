@extends('layouts.admin')
@section('content')
<section class="p-10 min-h-screen">

    <div class="bg-white rounded-3xl shadow-lg p-8">
        <h1 class="text-4xl font-bold text-pink-500 mb-8">Orders</h1>

        @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded-xl mb-6">{{ session('error') }}</div>
        @endif

        <table class="w-full text-left">
            <thead>
                <tr class="border-b text-gray-500 text-sm">
                    <th class="py-4 pr-4">Order ID</th>
                    <th class="pr-4">Customer</th>
                    <th class="pr-4">Date</th>
                    <th class="pr-4">Total</th>
                    <th class="pr-4">Status</th>
                    <th class="pr-4">Receipt</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr class="border-b hover:bg-pink-50 transition">
                    <td class="py-5 pr-4 font-semibold">#{{ $order->order_id }}</td>
                    <td class="pr-4">{{ $order->customer->customer_name ?? 'Guest' }}</td>
                    <td class="pr-4 text-gray-500 text-sm">{{ $order->created_at->format('d M Y') }}</td>
                    <td class="pr-4 font-bold text-pink-500">${{ number_format($order->total_amount, 2) }}</td>
                    <td class="pr-4">
                        @php
                            $statusColors = [
                                'pending'        => 'bg-gray-100 text-gray-600',
                                'pending review' => 'bg-yellow-100 text-yellow-700',
                                'paid'           => 'bg-green-100 text-green-600',
                                'rejected'       => 'bg-red-100 text-red-600',
                                'cancelled'      => 'bg-red-100 text-red-600',
                            ];
                            $color = $statusColors[$order->status] ?? 'bg-gray-100 text-gray-600';
                        @endphp
                        <span class="{{ $color }} px-3 py-1 rounded-full text-xs font-semibold capitalize">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td class="pr-4">
                        @if($order->receipt_image)
                        <a href="{{ asset($order->receipt_image) }}" target="_blank">
                            <img src="{{ asset($order->receipt_image) }}"
                                class="w-14 h-14 object-cover rounded-xl border-2 border-pink-200 hover:border-pink-500 transition cursor-pointer"
                                title="Click to view full receipt">
                        </a>
                        @else
                        <span class="text-gray-300 text-sm italic">No receipt</span>
                        @endif
                    </td>
                    <td>
                        @if($order->status === 'pending review')
                        <div class="flex gap-2">
                            <form action="{{ route('admin.order.approve', $order->order_id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-xl text-sm font-semibold transition">
                                    ✓ Approve
                                </button>
                            </form>
                            <form action="{{ route('admin.order.reject', $order->order_id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm font-semibold transition">
                                    ✕ Reject
                                </button>
                            </form>
                        </div>
                        @else
                        <span class="text-gray-300 text-sm">—</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-10 text-center text-gray-400">No orders yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
