@extends('layouts.app')
@section('content')
<section class="min-h-screen flex items-center justify-center bg-pink-100 py-20">
    <div class="bg-white shadow-2xl rounded-3xl p-10 w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-pink-500 mb-3">Create an account</h1>
            <p class="text-gray-600">Welcome to Magic Shop</p>
        </div>

        <form action="{{ route('register.post') }}" method="POST" id="registerForm" novalidate>
            @csrf

            <div class="mb-5">
                <label class="block mb-2 font-semibold">Username</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter your username"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                <p class="text-red-500 text-sm mt-1 hidden" id="name-error"></p>
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-semibold">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                <p class="text-red-500 text-sm mt-1 hidden" id="email-error"></p>
                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-semibold">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                <p class="text-red-500 text-sm mt-1 hidden" id="password-error"></p>
                @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-semibold">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                <p class="text-red-500 text-sm mt-1 hidden" id="confirm-error"></p>
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-semibold">Address</label>
                <input type="text" name="address" id="address" value="{{ old('address') }}" placeholder="Enter your address"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                <p class="text-red-500 text-sm mt-1 hidden" id="address-error"></p>
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-semibold">Phone Number</label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Enter your phone number"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                <p class="text-red-500 text-sm mt-1 hidden" id="phone-error"></p>
                @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" id="registerBtn"
                class="w-full bg-pink-300 text-white py-3 rounded-xl text-lg font-semibold cursor-not-allowed transition"
                disabled>
                Register
            </button>
        </form>

        <p class="text-center text-gray-600 mt-6">
            Have an account already?
            <a href="{{ route('login') }}" class="text-pink-500 font-semibold hover:underline">Login</a>
        </p>
    </div>
</section>

<script>
const fields = {
    name:                  { el: document.getElementById('name'),                  err: document.getElementById('name-error') },
    email:                 { el: document.getElementById('email'),                 err: document.getElementById('email-error') },
    password:              { el: document.getElementById('password'),              err: document.getElementById('password-error') },
    password_confirmation: { el: document.getElementById('password_confirmation'), err: document.getElementById('confirm-error') },
    address:               { el: document.getElementById('address'),               err: document.getElementById('address-error') },
    phone:                 { el: document.getElementById('phone'),                 err: document.getElementById('phone-error') },
};
const registerBtn = document.getElementById('registerBtn');

function isEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }
function isPhone(v) { return /^[\d\s\+\-]{6,20}$/.test(v); }

function showError(field, msg) {
    field.el.classList.add('border-red-400');
    field.el.classList.remove('border-gray-300');
    field.err.textContent = msg;
    field.err.classList.remove('hidden');
}

function clearError(field) {
    field.el.classList.remove('border-red-400');
    field.el.classList.add('border-gray-300');
    field.err.classList.add('hidden');
}

function validateField(key) {
    const f   = fields[key];
    const val = f.el.value.trim();
    if (key === 'name' && !val)                           { showError(f, 'Username is required.'); return false; }
    if (key === 'email' && !val)                          { showError(f, 'Email is required.'); return false; }
    if (key === 'email' && !isEmail(val))                 { showError(f, 'Enter a valid email address.'); return false; }
    if (key === 'password' && val.length < 6)             { showError(f, 'Password must be at least 6 characters.'); return false; }
    if (key === 'password_confirmation') {
        if (!val)                                         { showError(f, 'Please confirm your password.'); return false; }
        if (val !== fields.password.el.value.trim())      { showError(f, 'Passwords do not match.'); return false; }
    }
    if (key === 'address' && !val)                        { showError(f, 'Address is required.'); return false; }
    if (key === 'phone' && !val)                          { showError(f, 'Phone number is required.'); return false; }
    if (key === 'phone' && !isPhone(val))                 { showError(f, 'Enter a valid phone number.'); return false; }
    clearError(f);
    return true;
}

function checkForm() {
    const allOk = Object.keys(fields).every(k => {
        const f   = fields[k];
        const val = f.el.value.trim();
        if (k === 'email')                 return val && isEmail(val);
        if (k === 'password')              return val.length >= 6;
        if (k === 'password_confirmation') return val && val === fields.password.el.value.trim();
        if (k === 'phone')                 return val && isPhone(val);
        return val.length > 0;
    });

    registerBtn.disabled = !allOk;
    registerBtn.classList.toggle('bg-pink-500', allOk);
    registerBtn.classList.toggle('hover:bg-pink-600', allOk);
    registerBtn.classList.toggle('cursor-pointer', allOk);
    registerBtn.classList.toggle('bg-pink-300', !allOk);
    registerBtn.classList.toggle('cursor-not-allowed', !allOk);
}

Object.keys(fields).forEach(key => {
    fields[key].el.addEventListener('blur',  () => { validateField(key); checkForm(); });
    fields[key].el.addEventListener('input', () => { validateField(key); checkForm(); });
});
</script>
@endsection
