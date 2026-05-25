@extends('layouts.app')

@section('content')

<!-- HEADER -->
<section class="bg-pink-100 py-20">

    <div class="container mx-auto px-6 text-center">

        <h1 class="text-5xl font-bold text-pink-600 mb-4">
            Contact Us
        </h1>

        <p class="text-lg text-gray-700">
            We'd love to hear from you
        </p>

    </div>

</section>

<!-- CONTACT FORM -->
<section class="py-16 bg-white">

    <div class="container mx-auto px-6">

        <div class="max-w-3xl mx-auto bg-pink-50 p-10 rounded-3xl shadow-lg">

            <form>

                <div class="mb-6">

                    <label class="block mb-2 font-semibold">
                        Full Name
                    </label>

                    <input type="text"
                           placeholder="Enter your name"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">
                </div>

                <div class="mb-6">

                    <label class="block mb-2 font-semibold">
                        Email Address
                    </label>

                    <input type="email"
                           placeholder="Enter your email"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">
                </div>

                <div class="mb-6">

                    <label class="block mb-2 font-semibold">
                        Message
                    </label>

                    <textarea rows="5"
                              placeholder="Write your message"
                              class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400"></textarea>
                </div>

                <button type="submit"
                        class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-full text-lg">
                    Send Message
                </button>

            </form>

        </div>

    </div>

</section>

@endsection
