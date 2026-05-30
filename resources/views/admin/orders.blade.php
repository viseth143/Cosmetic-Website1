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
                    <th class="pr-4">Delivery</th>
                    <th class="pr-4">Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)

                <tr class="border-b hover:bg-pink-50 transition cursor-pointer"
                    onclick="toggleItems({{ $order->order_id }})">
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
                        @if($order->status === 'paid' && !$order->receipt_image)
                        <p class="text-orange-400 text-xs mt-1 font-medium">⚠️ COD — not paid yet</p>
                        @endif
                    </td>

                    <td class="pr-4" onclick="event.stopPropagation()">
                        @if($order->receipt_image)
                        <a href="{{ asset($order->receipt_image) }}" target="_blank">
                            <img src="{{ asset($order->receipt_image) }}"
                                class="w-14 h-14 object-cover rounded-xl border-2 border-pink-200 hover:border-pink-500 transition cursor-pointer">
                        </a>
                        @else
                        <span class="text-gray-300 text-sm italic">No receipt</span>
                        @endif
                    </td>

                    <td class="pr-4" onclick="event.stopPropagation()">
                        @if($order->status === 'paid')
                        <form action="{{ route('admin.order.delivery', $order->order_id) }}" method="POST">
                            @csrf
                            <select name="delivery_status" onchange="this.form.submit()"
                                class="border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                                <option value="preparing" {{ $order->delivery_status == 'preparing' ? 'selected' : '' }}>📦 Preparing</option>
                                <option value="shipped"   {{ $order->delivery_status == 'shipped'   ? 'selected' : '' }}>🚚 Shipped</option>
                                <option value="delivered" {{ $order->delivery_status == 'delivered' ? 'selected' : '' }}>✅ Delivered</option>
                            </select>
                        </form>
                        @else
                        <span class="text-gray-300 text-sm">—</span>
                        @endif
                    </td>

                    <td class="pr-4" onclick="event.stopPropagation()">
                        @if($order->status === 'pending review')
                        <div class="flex gap-2">
                            <form action="{{ route('admin.order.approve', $order->order_id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-xl text-xs font-semibold transition">
                                    ✓ Approve
                                </button>
                            </form>
                            <form action="{{ route('admin.order.reject', $order->order_id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-xl text-xs font-semibold transition">
                                    ✕ Reject
                                </button>
                            </form>
                        </div>
                        @else
                        <span class="text-gray-300 text-sm">—</span>
                        @endif
                    </td>

                    <td onclick="event.stopPropagation()">
                        <form action="{{ route('admin.order.delete', $order->order_id) }}" method="POST"
                            onsubmit="return confirm('Delete order #{{ $order->order_id }}? This cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-100 hover:bg-red-500 text-red-500 hover:text-white px-3 py-2 rounded-xl text-xs font-semibold transition">
                                🗑 Delete
                            </button>
                        </form>
                    </td>
                </tr>

                <tr id="items-{{ $order->order_id }}" class="hidden">
                    <td colspan="9" class="pb-4 px-4">
                        <div class="bg-pink-50 rounded-2xl p-5">
                            <p class="font-bold text-gray-700 mb-3 text-sm">Products in Order #{{ $order->order_id }}</p>
                            <div class="space-y-3">
                                @foreach($order->items as $item)
                                <div class="flex items-center gap-4 bg-white rounded-xl px-4 py-3 shadow-sm">
                                    <img src="{{ $item->product->images->first() ? asset($item->product->images->first()->image_url) : 'https://placehold.co/50x50?text=?' }}"
                                        class="w-12 h-12 rounded-xl object-cover">
                                    <div class="flex-1">
                                        <p class="font-semibold text-gray-800 text-sm">{{ $item->product->name }}</p>
                                        @if($item->product->description)
                                        <p class="text-pink-500 text-xs font-medium">{{ $item->product->description }}</p>
                                        @endif
                                        <p class="text-gray-400 text-xs">Qty: {{ $item->quantity }} × ${{ number_format($item->price, 2) }}</p>
                                    </div>
                                    <p class="font-bold text-pink-500 text-sm">${{ number_format($item->price * $item->quantity, 2) }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="9" class="py-10 text-center text-gray-400">No orders yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

<script>
function toggleItems(orderId) {
    const row = document.getElementById('items-' + orderId);
    row.classList.toggle('hidden');
}
</script>

@endsection
