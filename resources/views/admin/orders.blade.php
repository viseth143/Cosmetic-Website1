@extends('layouts.admin')

@section('content')
<main class="p-8">
    <div class="bg-white rounded-3xl shadow-lg p-6">
        <h1 class="text-3xl font-bold text-pink-500 mb-6">Orders</h1>

        @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 font-medium rounded-xl border border-green-200">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-700 font-medium rounded-xl border border-red-200">
            {{ session('error') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm align-middle">
                <thead>
                    <tr class="border-b bg-pink-50 text-gray-700 font-semibold uppercase text-xs">
                        <th class="p-4">Order ID</th>
                        <th class="p-4">Customer</th>
                        <th class="p-4">Date</th>
                        <th class="p-4">Total</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-center">Receipt</th>
                        <th class="p-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($orders as $order)
                    <tr class="hover:bg-pink-50 transition">
                        <td class="p-4 font-bold text-gray-600">
                            #{{ $orders->count() - $loop->index }}
                        </td>

                        <td class="p-4 font-medium">
                            @if($order->customer)
                            {{ $order->customer->customer_name }}
                            @else
                            <span class="text-gray-400 italic font-normal">Guest Customer</span>
                            @endif
                        </td>

                        <td class="p-4 text-gray-500">
                            {{ $order->created_at ? $order->created_at->format('d M Y') : '29 May 2026' }}
                        </td>

                        <td class="p-4 text-pink-500 font-bold">
                            ${{ number_format($order->total_amount ?? 0, 2) }}
                        </td>

                        <td class="p-4">
                            <span
                                class="px-3 py-1 rounded-full text-xs font-bold 
                                {{ strtolower($order->status) == 'paid' ? 'bg-green-100 text-green-700' : 
                                   (strtolower($order->status) == 'rejected' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                                {{ $order->status ?? 'Pending Review' }}
                            </span>
                        </td>

                        <td class="p-4 text-center">
                            @if($order->receipt_image)
                            <div class="relative w-12 h-16 mx-auto">
                                <img src="{{ asset('Images/' . basename($order->receipt_image)) }}"
                                    onerror="this.onerror=null; this.src='{{ asset($order->receipt_image) }}';"
                                    class="w-12 h-16 object-cover rounded-lg border border-gray-200 shadow-sm transition transform hover:scale-150 hover:z-50"
                                    alt="Receipt Photo">
                            </div>
                            @else
                            <div
                                class="w-12 h-16 bg-gray-100 rounded-lg border border-gray-200 flex items-center justify-center text-gray-400 text-[10px] font-semibold shadow-sm mx-auto">
                                No Img
                            </div>
                            @endif
                        </td>

                        <td class="p-4 text-center">
                            <div class="flex items-center justify-center space-x-2">
                                @if(strtolower($order->status) == 'pending review' || strtolower($order->status) ==
                                'pending')
                                <form action="{{ route('admin.order.approve', $order->order_id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="bg-emerald-500 text-white px-3 py-2 rounded-xl text-xs font-bold hover:bg-emerald-600 transition shadow-sm">
                                        <i class="fa-solid fa-check"></i> Approve
                                    </button>
                                </form>
                                <form action="{{ route('admin.order.reject', $order->order_id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-2 rounded-xl text-xs font-bold hover:bg-red-600 transition shadow-sm">
                                        <i class="fa-solid fa-xmark"></i> Reject
                                    </button>
                                </form>
                                @endif

                                <form action="{{ route('admin.order.delete', $order->order_id) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete Order #{{ $order->order_id }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-gray-700 text-white px-3 py-2 rounded-xl text-xs font-bold hover:bg-black transition shadow-sm"
                                        title="Delete Order">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-10 text-gray-400">No orders placed yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection