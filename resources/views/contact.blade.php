@extends('layouts.app')

@section('content')

<section class="bg-pink-100 py-20">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-5xl font-bold text-pink-600 mb-4">Contact Us</h1>
        <p class="text-lg text-gray-700">We'd love to hear from you</p>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-3xl mx-auto bg-pink-50 p-10 rounded-3xl shadow-lg">

            @if(session('success'))
            <div class="bg-green-100 text-green-700 border border-green-300 px-5 py-3 rounded-xl mb-6">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" id="contactForm" novalidate>
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 font-semibold">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter your name"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                    <p class="text-red-500 text-sm mt-1 hidden" id="name-error"></p>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 font-semibold">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                    <p class="text-red-500 text-sm mt-1 hidden" id="email-error"></p>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 font-semibold">Message</label>
                    <textarea name="message" id="message" rows="5" placeholder="Write your message (min 10 characters)"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition">{{ old('message') }}</textarea>
                    <p class="text-red-500 text-sm mt-1 hidden" id="message-error"></p>
                </div>

                <button type="submit" id="contactBtn"
                    class="bg-pink-300 text-white px-8 py-3 rounded-full text-lg cursor-not-allowed transition"
                    disabled>
                    Send Message
                </button>
            </form>

        </div>
    </div>
</section>

<script>
const cFields = {
    name:    { el: document.getElementById('name'),    err: document.getElementById('name-error') },
    email:   { el: document.getElementById('email'),   err: document.getElementById('email-error') },
    message: { el: document.getElementById('message'), err: document.getElementById('message-error') },
};
const contactBtn = document.getElementById('contactBtn');

function isEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }

function showErr(f, msg) {
    f.el.classList.add('border-red-400'); f.el.classList.remove('border-gray-300');
    f.err.textContent = msg; f.err.classList.remove('hidden');
}
function clearErr(f) {
    f.el.classList.remove('border-red-400'); f.el.classList.add('border-gray-300');
    f.err.classList.add('hidden');
}

function validateContact(key) {
    const f = cFields[key]; const val = f.el.value.trim();
    if (key === 'name'    && !val)               { showErr(f, 'Full name is required.'); return false; }
    if (key === 'email'   && !val)               { showErr(f, 'Email is required.'); return false; }
    if (key === 'email'   && !isEmail(val))      { showErr(f, 'Enter a valid email address.'); return false; }
    if (key === 'message' && val.length < 10)    { showErr(f, 'Message must be at least 10 characters.'); return false; }
    clearErr(f); return true;
}

function checkContact() {
    const ok = cFields.name.el.value.trim() &&
               isEmail(cFields.email.el.value.trim()) &&
               cFields.message.el.value.trim().length >= 10;
    contactBtn.disabled = !ok;
    contactBtn.classList.toggle('bg-pink-500', !!ok);
    contactBtn.classList.toggle('hover:bg-pink-600', !!ok);
    contactBtn.classList.toggle('cursor-pointer', !!ok);
    contactBtn.classList.toggle('bg-pink-300', !ok);
    contactBtn.classList.toggle('cursor-not-allowed', !ok);
}

Object.keys(cFields).forEach(k => {
    cFields[k].el.addEventListener('blur',  () => { validateContact(k); checkContact(); });
    cFields[k].el.addEventListener('input', () => { validateContact(k); checkContact(); });
});
</script>

@endsection
