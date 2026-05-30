@extends('layouts.app')

@section('content')

<section class="bg-pink-50 min-h-screen py-16">
    <div class="container mx-auto px-6 max-w-4xl">

        <h1 class="text-4xl font-bold text-pink-500 mb-8">My Orders</h1>

        @if($orders->isEmpty())
        <div class="bg-white rounded-3xl shadow p-12 text-center">
            <div class="text-6xl mb-4">🛍️</div>
            <p class="text-gray-400 text-lg">You have no orders yet.</p>
            <a href="{{ route('shop') }}"
                class="inline-block mt-6 bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-2xl font-semibold transition">
                Start Shopping
            </a>
        </div>
        @else
        <div class="space-y-6">
            @foreach($orders as $order)
            <div class="bg-white rounded-3xl shadow-lg p-8">

                {{-- Order header --}}
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <p class="text-gray-400 text-sm">Order ID</p>
                        <p class="font-bold text-gray-800 text-lg">#{{ $order->order_id }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm">Date</p>
                        <p class="font-semibold text-gray-700">{{ $order->created_at->format('d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm">Total</p>
                        <p class="font-bold text-pink-500 text-lg">${{ number_format($order->total_amount, 2) }}</p>
                    </div>
                    <div>
                        @php
                            $statusConfig = [
                                'pending'        => ['bg-gray-100 text-gray-600',    '🕐', 'Pending'],
                                'pending review' => ['bg-yellow-100 text-yellow-700', '⏳', 'Pending Review'],
                                'paid'           => ['bg-green-100 text-green-600',   '✅', 'Approved'],
                                'rejected'       => ['bg-red-100 text-red-600',       '❌', 'Rejected'],
                                'cancelled'      => ['bg-red-100 text-red-600',       '❌', 'Cancelled'],
                            ];
                            [$colorClass, $icon, $label] = $statusConfig[$order->status] ?? ['bg-gray-100 text-gray-600', '🕐', ucfirst($order->status)];
                        @endphp
                        <span class="{{ $colorClass }} px-4 py-2 rounded-full text-sm font-semibold">
                            {{ $icon }} {{ $label }}
                        </span>
                    </div>
                </div>

                {{-- Payment & Delivery section --}}
                @if($order->status === 'paid')
                <div class="bg-green-50 border border-green-200 rounded-2xl px-5 py-4 mb-4 flex items-center gap-3">
                    <span class="text-2xl">✅</span>
                    <p class="text-green-700 font-medium">Your payment has been approved!</p>
                </div>

                {{-- Delivery tracking --}}
                @php
                    $steps = [
                        'preparing' => ['label' => 'Preparing', 'icon' => '📦', 'desc' => 'We are packing your order'],
                        'shipped'   => ['label' => 'Shipped',   'icon' => '🚚', 'desc' => 'Your order is on the way'],
                        'delivered' => ['label' => 'Delivered', 'icon' => '🏠', 'desc' => 'Your order has arrived'],
                    ];
                    $stepKeys    = array_keys($steps);
                    $currentStep = $order->delivery_status ?? 'preparing';
                    $currentIdx  = array_search($currentStep, $stepKeys);
                @endphp

                <div class="bg-pink-50 border border-pink-100 rounded-2xl px-6 py-5 mb-4">
                    <p class="font-bold text-gray-700 mb-6">Delivery Status</p>

                    {{-- Progress tracker --}}
                    <div class="flex items-start justify-between relative px-5">

                        {{-- Background line --}}
                        <div class="absolute top-5 left-5 right-5 h-1 bg-gray-200 z-0"></div>

                        {{-- Filled line --}}
                        @php
                            $fillPercent = $currentIdx == 0 ? '0%' : ($currentIdx == 1 ? '50%' : '100%');
                        @endphp
                        <div class="absolute top-5 left-5 h-1 bg-pink-400 z-0" style="width: {{ $fillPercent }}; max-width: calc(100% - 40px)"></div>

                        @foreach($steps as $key => $step)
                        @php
                            $stepIdx = array_search($key, $stepKeys);
                            $done    = $stepIdx <= $currentIdx;
                        @endphp
                        <div class="flex flex-col items-center z-10 w-1/3">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-lg mb-2
                                {{ $done ? 'bg-pink-500 text-white' : 'bg-gray-200 text-gray-400' }}">
                                {{ $step['icon'] }}
                            </div>
                            <p class="font-semibold text-sm text-center {{ $done ? 'text-pink-500' : 'text-gray-400' }}">
                                {{ $step['label'] }}
                            </p>
                            @if($key === $currentStep)
                            <p class="text-xs text-gray-400 mt-1 text-center">{{ $step['desc'] }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- "I Received My Order" button — only show when shipped --}}
                @if($currentStep === 'shipped')
                <form action="{{ route('order.received', $order->order_id) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full mt-2 bg-green-500 hover:bg-green-600 text-white py-3 rounded-2xl font-semibold transition flex items-center justify-center gap-2">
                        🏠 I Received My Order
                    </button>
                </form>
                @endif

                @elseif($order->status === 'rejected')
                <div class="bg-red-50 border border-red-200 rounded-2xl px-5 py-4 mb-4 flex items-center gap-3">
                    <span class="text-2xl">❌</span>
                    <p class="text-red-700 font-medium">Your payment was rejected. Please contact us or place a new order.</p>
                </div>

                @elseif($order->status === 'pending review')
                <div class="bg-yellow-50 border border-yellow-200 rounded-2xl px-5 py-4 mb-4 flex items-center gap-3">
                    <span class="text-2xl">⏳</span>
                    <p class="text-yellow-700 font-medium">Your payment screenshot is being reviewed. Please wait.</p>
                </div>
                @endif

                {{-- Order items --}}
                <div class="space-y-4">
                    @foreach($order->items as $item)
                    <div class="flex items-center gap-4 border-t pt-4">
                        <img src="{{ $item->product->images->first() ? asset($item->product->images->first()->image_url) : 'https://placehold.co/60x60?text=?' }}"
                            class="w-16 h-16 rounded-xl object-cover">
                        <div class="flex-1">
                            <p class="font-bold text-gray-800">{{ $item->product->name }}</p>
                            <p class="text-gray-400 text-sm">Qty: {{ $item->quantity }}</p>
                        </div>
                        <p class="font-bold text-gray-700">${{ number_format($item->price * $item->quantity, 2) }}</p>
                    </div>
                    @endforeach
                </div>

            </div>
            @endforeach
        </div>
        @endif

    </div>
</section>

@endsection
