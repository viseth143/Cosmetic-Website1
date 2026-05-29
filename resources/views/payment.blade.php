@extends('layouts.app')

@section('content')

<section class="bg-pink-100 py-16">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-5xl font-bold text-pink-600 mb-4">Payment</h1>
        <p class="text-lg text-gray-700">Complete your payment via QR Pay</p>
    </div>
</section>

<section class="bg-pink-50 py-16 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-10 max-w-5xl mx-auto">

            <!-- QR CODE + UPLOAD -->
            <div class="bg-white rounded-3xl shadow-lg p-10 text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Scan to Pay</h2>
                <p class="text-gray-500 mb-6">Open your Payment app and scan the QR code below</p>

                <div class="flex justify-center mb-6">
                    <img src="{{ asset('Images/Qr_Payment.jpg') }}" alt="QR Code"
                        class="w-64 h-64 object-contain rounded-2xl shadow-md border-4 border-pink-100">
                </div>

                <div class="bg-pink-50 rounded-2xl p-4 mb-6">
                    <p class="text-gray-600 text-sm mb-1">Account Name</p>
                    <p class="font-bold text-gray-800 text-lg">Magic Shop</p>
                </div>

                <div class="border-2 border-dashed border-pink-300 rounded-2xl p-6">
                    <p class="text-pink-500 font-semibold mb-2">📸 Upload Your Payment Screenshot</p>
                    <p class="text-gray-400 text-sm mb-4">After paying, upload your receipt so we can verify</p>
                    <label for="screenshot-input"
                        class="cursor-pointer bg-pink-500 hover:bg-pink-600 text-white px-5 py-2 rounded-xl text-sm font-semibold transition inline-block">
                        Choose File
                    </label>
                    <p id="file-name" class="text-gray-500 text-sm mt-3">No file selected</p>
                    <img id="preview" class="hidden mt-4 mx-auto rounded-xl max-h-40 object-cover shadow" />
                </div>
            </div>

            <!-- ORDER SUMMARY + CONFIRM -->
            <div class="bg-white rounded-3xl shadow-lg p-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Order Summary</h2>

                @if(isset($cartItems) && !$cartItems->isEmpty())
                @foreach($cartItems as $item)
                <div class="flex justify-between items-center mb-4 pb-4 border-b">
                    <div class="flex items-center gap-3">
                        <img src="{{ $item->product->images->first() ? asset($item->product->images->first()->image_url) : 'https://placehold.co/60x60?text=?' }}"
                            class="w-14 h-14 rounded-xl object-cover">
                        <div>
                            <p class="font-bold text-sm">{{ $item->product->name }}</p>
                            <p class="text-gray-500 text-xs">Qty: {{ $item->quantity }}</p>
                        </div>
                    </div>
                    <span class="font-bold text-sm">${{ number_format($item->price * $item->quantity, 2) }}</span>
                </div>
                @endforeach

                <div class="space-y-3 mt-4">
                    <div class="flex justify-between text-gray-600">
                        <span>Subtotal</span>
                        <span class="font-bold">${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Shipping</span>
                        <span class="font-bold">
                            @if($shipping == 0)
                            <span class="text-green-500">Free 🎉</span>
                            @else
                            ${{ number_format($shipping, 2) }}
                            @endif
                        </span>
                    </div>
                    <div class="flex justify-between text-xl font-bold border-t pt-4">
                        <span>Total</span>
                        <span class="text-pink-500">${{ number_format($total, 2) }}</span>
                    </div>
                </div>
                @else
                <p class="text-gray-400 text-center py-4">No items found.</p>
                @endif

                <div class="mt-6 bg-pink-50 rounded-2xl p-5">
                    <p class="font-bold text-gray-700 mb-3">How to pay:</p>
                    <ol class="space-y-2 text-sm text-gray-600 list-decimal list-inside">
                        <li>Open your <span class="font-semibold text-pink-500">Payment</span> app</li>
                        <li>Tap <span class="font-semibold">Pay → Scan QR</span></li>
                        <li>Scan the QR code on the left</li>
                        <li>Enter the amount and confirm</li>
                        <li>Upload your screenshot on the left</li>
                        <li>Click <span class="font-semibold text-pink-500">I've Paid</span> below</li>
                    </ol>
                </div>

                <form action="{{ route('order.success') }}" method="POST" enctype="multipart/form-data" id="paymentForm">
                    @csrf
                    <input type="file" id="screenshot-input" name="payment_screenshot" accept="image/*" class="hidden">

                    <p id="upload-warning" class="hidden text-red-500 text-sm mt-4 text-center font-medium">
                        ⚠️ Please upload your payment screenshot first.
                    </p>

                    <button type="submit"
                        class="block text-center w-full mt-6 bg-pink-500 hover:bg-pink-600 text-white py-4 rounded-2xl text-lg font-semibold transition">
                        ✅ I've Paid — Confirm Order
                    </button>
                </form>

                <a href="{{ route('cart') }}"
                    class="block text-center w-full mt-3 border-2 border-gray-200 hover:bg-gray-50 text-gray-500 py-3 rounded-2xl text-sm font-semibold transition">
                    ← Back to Cart
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    const input = document.getElementById('screenshot-input');
    const preview = document.getElementById('preview');
    const fileName = document.getElementById('file-name');
    const form = document.getElementById('paymentForm');
    const warning = document.getElementById('upload-warning');

    document.querySelector('label[for="screenshot-input"]').addEventListener('click', function(e) {
        e.preventDefault();
        input.click();
    });

    input.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            fileName.textContent = file.name;
            warning.classList.add('hidden');
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    form.addEventListener('submit', function(e) {
        if (!input.files || input.files.length === 0) {
            e.preventDefault();
            warning.classList.remove('hidden');
            document.getElementById('screenshot-input').scrollIntoView({ behavior: 'smooth' });
        }
    });
</script>

@endsection
