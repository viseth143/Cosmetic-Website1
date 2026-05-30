@extends('layouts.app')

@section('content')

<section class="bg-pink-100 py-16">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-5xl font-bold text-pink-600 mb-4">Checkout</h1>
        <p class="text-lg text-gray-700">Complete your order</p>
    </div>
</section>

<section class="bg-pink-50 py-16 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-10">

            <!-- BILLING FORM -->
            <div class="lg:col-span-2 bg-white rounded-3xl shadow-lg p-10">
                <h2 class="text-3xl font-bold mb-8">Billing Details</h2>

                @if($errors->any())
                <div class="bg-red-100 text-red-700 border border-red-300 px-5 py-3 rounded-xl mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('checkout.store') }}" id="checkoutForm" novalidate>
                    @csrf

                    {{-- Name --}}
                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block mb-2 font-semibold">First Name <span class="text-red-500">*</span></label>
                            <input type="text" name="first_name" id="first_name"
                                value="{{ old('first_name') }}"
                                placeholder="Enter first name"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                            <p class="text-red-500 text-sm mt-1 hidden" id="first_name-error"></p>
                        </div>
                        <div>
                            <label class="block mb-2 font-semibold">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" name="last_name" id="last_name"
                                value="{{ old('last_name') }}"
                                placeholder="Enter last name"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                            <p class="text-red-500 text-sm mt-1 hidden" id="last_name-error"></p>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="mb-6">
                        <label class="block mb-2 font-semibold">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email"
                            value="{{ old('email', $customer->email ?? '') }}"
                            placeholder="Enter email"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                        <p class="text-red-500 text-sm mt-1 hidden" id="email-error"></p>
                    </div>

                    {{-- Phone --}}
                    <div class="mb-6">
                        <label class="block mb-2 font-semibold">Phone Number <span class="text-red-500">*</span></label>
                        <input type="text" name="phone" id="phone"
                            value="{{ old('phone', $customer->phone ?? '') }}"
                            placeholder="Enter phone number"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                        <p class="text-red-500 text-sm mt-1 hidden" id="phone-error"></p>
                    </div>

                    {{-- Province --}}
                    <div class="mb-6">
                        <label class="block mb-2 font-semibold">Province <span class="text-red-500">*</span></label>
                        <select name="province" id="province"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                            <option value="">Select province</option>
                            <option value="Phnom Penh"      {{ old('province') == 'Phnom Penh'      ? 'selected' : '' }}>Phnom Penh</option>
                            <option value="Siem Reap"       {{ old('province') == 'Siem Reap'       ? 'selected' : '' }}>Siem Reap</option>
                            <option value="Battambang"      {{ old('province') == 'Battambang'      ? 'selected' : '' }}>Battambang</option>
                            <option value="Kampong Cham"    {{ old('province') == 'Kampong Cham'    ? 'selected' : '' }}>Kampong Cham</option>
                            <option value="Kampong Chhnang" {{ old('province') == 'Kampong Chhnang' ? 'selected' : '' }}>Kampong Chhnang</option>
                            <option value="Kampong Speu"    {{ old('province') == 'Kampong Speu'    ? 'selected' : '' }}>Kampong Speu</option>
                            <option value="Kampong Thom"    {{ old('province') == 'Kampong Thom'    ? 'selected' : '' }}>Kampong Thom</option>
                            <option value="Kampot"          {{ old('province') == 'Kampot'          ? 'selected' : '' }}>Kampot</option>
                            <option value="Kandal"          {{ old('province') == 'Kandal'          ? 'selected' : '' }}>Kandal</option>
                            <option value="Kep"             {{ old('province') == 'Kep'             ? 'selected' : '' }}>Kep</option>
                            <option value="Koh Kong"        {{ old('province') == 'Koh Kong'        ? 'selected' : '' }}>Koh Kong</option>
                            <option value="Kratie"          {{ old('province') == 'Kratie'          ? 'selected' : '' }}>Kratie</option>
                            <option value="Mondulkiri"      {{ old('province') == 'Mondulkiri'      ? 'selected' : '' }}>Mondulkiri</option>
                            <option value="Oddar Meanchey"  {{ old('province') == 'Oddar Meanchey'  ? 'selected' : '' }}>Oddar Meanchey</option>
                            <option value="Pailin"          {{ old('province') == 'Pailin'          ? 'selected' : '' }}>Pailin</option>
                            <option value="Preah Sihanouk"  {{ old('province') == 'Preah Sihanouk'  ? 'selected' : '' }}>Preah Sihanouk</option>
                            <option value="Preah Vihear"    {{ old('province') == 'Preah Vihear'    ? 'selected' : '' }}>Preah Vihear</option>
                            <option value="Prey Veng"       {{ old('province') == 'Prey Veng'       ? 'selected' : '' }}>Prey Veng</option>
                            <option value="Pursat"          {{ old('province') == 'Pursat'          ? 'selected' : '' }}>Pursat</option>
                            <option value="Ratanakiri"      {{ old('province') == 'Ratanakiri'      ? 'selected' : '' }}>Ratanakiri</option>
                            <option value="Stung Treng"     {{ old('province') == 'Stung Treng'     ? 'selected' : '' }}>Stung Treng</option>
                            <option value="Svay Rieng"      {{ old('province') == 'Svay Rieng'      ? 'selected' : '' }}>Svay Rieng</option>
                            <option value="Takeo"           {{ old('province') == 'Takeo'           ? 'selected' : '' }}>Takeo</option>
                            <option value="Tbong Khmum"     {{ old('province') == 'Tbong Khmum'     ? 'selected' : '' }}>Tbong Khmum</option>
                        </select>
                        <p class="text-red-500 text-sm mt-1 hidden" id="province-error"></p>
                    </div>

                    {{-- District --}}
                    <div class="mb-6">
                        <label class="block mb-2 font-semibold">District / Khan <span class="text-red-500">*</span></label>
                        <input type="text" name="district" id="district"
                            value="{{ old('district') }}"
                            placeholder="e.g. Daun Penh, Sen Sok, Meanchey"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                        <p class="text-red-500 text-sm mt-1 hidden" id="district-error"></p>
                    </div>

                    {{-- House / Street Address (optional) --}}
                    <div class="mb-6">
                        <label class="block mb-2 font-semibold">House / Street Address <span class="text-gray-400 font-normal">(optional)</span></label>
                        <input type="text" name="address" id="address"
                            value="{{ old('address') }}"
                            placeholder="e.g. House #12, Street 271, Boeng Salang"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                    </div>

                    {{-- Delivery Note (optional) --}}
                    <div class="mb-6">
                        <label class="block mb-2 font-semibold">Delivery Note <span class="text-gray-400 font-normal">(optional)</span></label>
                        <input type="text" name="delivery_note" id="delivery_note"
                            value="{{ old('delivery_note') }}"
                            placeholder="e.g. Near the market, call when arrived, blue gate"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                    </div>

                    {{-- Payment Method --}}
                    <div class="mb-8">
                        <label class="block mb-4 font-semibold text-xl">Payment Method <span class="text-red-500">*</span></label>

                        {{-- ABA Pay — always visible --}}
                        <div class="space-y-4">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="payment_method" value="aba" class="text-pink-500 payment-radio"
                                    {{ old('payment_method', 'aba') == 'aba' ? 'checked' : '' }}>
                                <span>QR Pay</span>
                            </label>

                            {{-- Cash on Delivery — only for Phnom Penh --}}
                            <label class="flex items-center gap-3 cursor-pointer" id="cod-option" style="display:none">
                                <input type="radio" name="payment_method" value="cod" class="text-pink-500 payment-radio"
                                    {{ old('payment_method') == 'cod' ? 'checked' : '' }}>
                                <span>Cash on Delivery</span>
                            </label>
                        </div>

                        {{-- Info message --}}
                        <p id="payment-info" class="text-gray-400 text-sm mt-3 hidden">
                            🚚 Cash on Delivery is only available in Phnom Penh.
                        </p>
                        <p class="text-red-500 text-sm mt-2 hidden" id="payment-error">Please select a payment method.</p>
                    </div>

                    <button type="submit" id="placeOrderBtn"
                        class="w-full bg-pink-300 text-white py-4 rounded-2xl text-lg font-semibold cursor-not-allowed transition"
                        disabled>
                        Place Order
                    </button>
                    <p class="text-center text-gray-400 text-sm mt-3">* Please fill all required fields to continue</p>
                </form>
            </div>

            <!-- ORDER SUMMARY -->
            <div class="bg-white rounded-3xl shadow-lg p-8 h-fit sticky top-6">
                <h2 class="text-2xl font-bold mb-6">Order Summary</h2>
                @if($cartItems->isEmpty())
                <p class="text-gray-500 text-center py-4">No items in cart.</p>
                @else
                @foreach($cartItems as $item)
                <div class="flex justify-between items-center mb-5 pb-4 border-b">
                    <div class="flex items-center gap-3">
                        <img src="{{ $item->product->images->first() ? asset($item->product->images->first()->image_url) : 'https://placehold.co/60x60?text=?' }}"
                            class="w-14 h-14 rounded-xl object-cover">
                        <div>
                            <h3 class="font-bold text-sm">{{ $item->product->name }}</h3>
                            <p class="text-gray-500 text-xs">Qty: {{ $item->quantity }}</p>
                        </div>
                    </div>
                    <span class="font-bold text-sm">${{ number_format($item->price * $item->quantity, 2) }}</span>
                </div>
                @endforeach
                <div class="space-y-4 mt-4">
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
                @endif
            </div>

        </div>
    </div>
</section>

<script>
const chFields = {
    first_name: { el: document.getElementById('first_name'), err: document.getElementById('first_name-error') },
    last_name:  { el: document.getElementById('last_name'),  err: document.getElementById('last_name-error') },
    email:      { el: document.getElementById('email'),      err: document.getElementById('email-error') },
    phone:      { el: document.getElementById('phone'),      err: document.getElementById('phone-error') },
    province:   { el: document.getElementById('province'),   err: document.getElementById('province-error') },
    district:   { el: document.getElementById('district'),   err: document.getElementById('district-error') },
};
const placeBtn      = document.getElementById('placeOrderBtn');
const paymentErr    = document.getElementById('payment-error');
const paymentInfo   = document.getElementById('payment-info');
const paymentRadios = document.querySelectorAll('.payment-radio');
const codOption     = document.getElementById('cod-option');
const provinceEl    = document.getElementById('province');

function isEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }
function isPhone(v) { return /^[\d\s\+\-]{6,20}$/.test(v); }

function showErr(f, msg) {
    f.el.classList.add('border-red-400');
    f.el.classList.remove('border-gray-300');
    f.err.textContent = msg;
    f.err.classList.remove('hidden');
}
function clearErr(f) {
    f.el.classList.remove('border-red-400');
    f.el.classList.add('border-gray-300');
    f.err.classList.add('hidden');
}

function validateCh(key) {
    const f   = chFields[key];
    const val = f.el.value.trim();
    if (key === 'email' && val && !isEmail(val)) { showErr(f, 'Enter a valid email.'); return false; }
    if (key === 'phone' && val && !isPhone(val)) { showErr(f, 'Enter a valid phone number.'); return false; }
    if (!val) { showErr(f, 'This field is required.'); return false; }
    clearErr(f);
    return true;
}

function updatePaymentOptions() {
    const isPhnomPenh = provinceEl.value === 'Phnom Penh';

    if (isPhnomPenh) {
        // Show COD option
        codOption.style.display = 'flex';
        paymentInfo.classList.add('hidden');
    } else {
        // Hide COD and uncheck it if selected
        codOption.style.display = 'none';
        paymentInfo.classList.remove('hidden');
        const codRadio = codOption.querySelector('input[type="radio"]');
        if (codRadio.checked) {
            codRadio.checked = false;
            // Auto-select ABA pay
            document.querySelector('input[value="aba"]').checked = true;
        }
    }
    checkCheckout();
}

function checkCheckout() {
    const textOk = Object.keys(chFields).every(k => {
        const val = chFields[k].el.value.trim();
        if (k === 'email') return val && isEmail(val);
        if (k === 'phone') return val && isPhone(val);
        return val.length > 0;
    });
    const paymentOk = [...paymentRadios].some(r => r.checked);
    const allOk     = textOk && paymentOk;

    placeBtn.disabled = !allOk;
    placeBtn.classList.toggle('bg-pink-500',        allOk);
    placeBtn.classList.toggle('hover:bg-pink-600',  allOk);
    placeBtn.classList.toggle('cursor-pointer',     allOk);
    placeBtn.classList.toggle('bg-pink-300',        !allOk);
    placeBtn.classList.toggle('cursor-not-allowed', !allOk);
}

Object.keys(chFields).forEach(k => {
    chFields[k].el.addEventListener('blur',   () => { validateCh(k); checkCheckout(); });
    chFields[k].el.addEventListener('input',  () => { validateCh(k); checkCheckout(); });
    chFields[k].el.addEventListener('change', () => { validateCh(k); checkCheckout(); });
});

// Update payment options when province changes
provinceEl.addEventListener('change', updatePaymentOptions);

paymentRadios.forEach(r => r.addEventListener('change', () => {
    paymentErr.classList.add('hidden');
    checkCheckout();
}));

window.addEventListener('load', () => {
    updatePaymentOptions();
    checkCheckout();
});
</script>

@endsection
