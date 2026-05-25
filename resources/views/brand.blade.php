@extends('layouts.app')

@section('content')

<!-- HEADER -->
<section class="bg-pink-100 py-20">

    <div class="container mx-auto px-6 text-center">

        <h1 class="text-5xl font-bold text-pink-600 mb-4">
            Product Brands
        </h1>

        <p class="text-lg text-gray-700">
            Explore skincare brands we provide
        </p>

    </div>

</section>

<!-- BRANDS -->
<section class="py-16 bg-white">

    <div class="container mx-auto px-6">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            <!-- BRAND CARD -->
            <div class="bg-pink-50 rounded-3xl shadow-lg p-8 text-center hover:shadow-2xl transition">

                <img src="{{ asset('images/weyoung.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center" />

                <h2 class="text-2xl font-bold mb-3">
                    Weyoung
                </h2>

                <p class="text-gray-600">
                    Dermatologist-developed skincare products.
                </p>

            </div>

            <!-- BRAND CARD -->
            <div class="bg-pink-50 rounded-3xl shadow-lg p-8 text-center hover:shadow-2xl transition">

                <img src="{{ asset('images/pka.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center" />

                <h2 class="text-2xl font-bold mb-3">
                    Pka
                </h2>

                <p class="text-gray-600">
                    Sensitive skin skincare solutions.
                </p>

            </div>

            <!-- BRAND CARD -->
            <div class="bg-pink-50 rounded-3xl shadow-lg p-8 text-center hover:shadow-2xl transition">

                <img src="{{ asset('images/naceca.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center " />

                <h2 class="text-2xl font-bold mb-3">
                    NACECA
                </h2>

                <p class="text-gray-600">
                    Minimalist and effective skincare formulas.
                </p>

            </div>

            <!-- BRAND CARD -->
            <div class="bg-pink-50 rounded-3xl shadow-lg p-8 text-center hover:shadow-2xl transition">

                <img src="{{ asset('images/justice.jpg') }}"
                    alt="Velvet Matte Lipstick"
                    class="w-full h-44 object-contain object-center " />

                <h2 class="text-2xl font-bold mb-3">
                    Justice
                </h2>

                <p class="text-gray-600">
                    Popular Korean skincare products.
                </p>

            </div>

        </div>

    </div>

</section>

@endsection
