@extends('layouts.app')
@section('content')
<section class="min-h-screen flex items-center justify-center bg-pink-100 py-20">
    <div class="bg-white shadow-2xl rounded-3xl p-10 w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-pink-500 mb-3">Welcome Back</h1>
            <p class="text-gray-600">Login to your account</p>
        </div>

        @if(session('error'))
        <div class="bg-red-100 text-red-600 px-4 py-3 rounded-xl mb-5">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" id="loginForm" novalidate>
            @csrf

            <div class="mb-5">
                <label class="block mb-2 font-semibold">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    placeholder="Enter your email"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                <p class="text-red-500 text-sm mt-1 hidden" id="email-error"></p>
                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-semibold">Password</label>
                <input type="password" name="password" id="password"
                    placeholder="Enter your password"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                <p class="text-red-500 text-sm mt-1 hidden" id="password-error"></p>
                @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" id="loginBtn"
                class="w-full bg-pink-300 text-white py-3 rounded-xl text-lg font-semibold cursor-not-allowed transition"
                disabled>
                Login
            </button>
        </form>

        <p class="text-center text-gray-600 mt-6">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-pink-500 font-semibold hover:underline">Register</a>
        </p>
    </div>
</section>

<script>
const emailInput    = document.getElementById('email');
const passwordInput = document.getElementById('password');
const emailError    = document.getElementById('email-error');
const passwordError = document.getElementById('password-error');
const loginBtn      = document.getElementById('loginBtn');

function validateEmail(val) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val);
}

function showError(input, errorEl, msg) {
    input.classList.add('border-red-400');
    input.classList.remove('border-gray-300');
    errorEl.textContent = msg;
    errorEl.classList.remove('hidden');
}

function clearError(input, errorEl) {
    input.classList.remove('border-red-400');
    input.classList.add('border-gray-300');
    errorEl.classList.add('hidden');
}

function checkForm() {
    const emailOk    = validateEmail(emailInput.value.trim());
    const passwordOk = passwordInput.value.length >= 1;

    if (emailOk && passwordOk) {
        loginBtn.disabled = false;
        loginBtn.classList.remove('bg-pink-300', 'cursor-not-allowed');
        loginBtn.classList.add('bg-pink-500', 'hover:bg-pink-600', 'cursor-pointer');
    } else {
        loginBtn.disabled = true;
        loginBtn.classList.add('bg-pink-300', 'cursor-not-allowed');
        loginBtn.classList.remove('bg-pink-500', 'hover:bg-pink-600', 'cursor-pointer');
    }
}

emailInput.addEventListener('blur', () => {
    if (!emailInput.value.trim()) {
        showError(emailInput, emailError, 'Email is required.');
    } else if (!validateEmail(emailInput.value.trim())) {
        showError(emailInput, emailError, 'Please enter a valid email address.');
    } else {
        clearError(emailInput, emailError);
    }
    checkForm();
});

emailInput.addEventListener('input', () => {
    if (validateEmail(emailInput.value.trim())) clearError(emailInput, emailError);
    checkForm();
});

passwordInput.addEventListener('blur', () => {
    if (!passwordInput.value) {
        showError(passwordInput, passwordError, 'Password is required.');
    } else {
        clearError(passwordInput, passwordError);
    }
    checkForm();
});

passwordInput.addEventListener('input', () => {
    if (passwordInput.value) clearError(passwordInput, passwordError);
    checkForm();
});
</script>
@endsection
