<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>GlowSkin</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 text-gray-800">

    <div class="flex min-h-screen">
        <!-- SIDEBAR -->
        <aside class="w-64 bg-white shadow-xl">
            <div class="p-6 border-b">
                <h1 class="text-3xl font-bold text-pink-500">
                    Admin Panel
                </h1>
            </div>
            <nav class="p-6">
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                        class="block bg-pink-500 text-white px-4 py-3 rounded-xl">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products') }}"
                        class="block hover:bg-pink-100 px-4 py-3 rounded-xl">
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.brands') }}"
                        class="block hover:bg-pink-100 px-4 py-3 rounded-xl">
                            Brands
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.orders') }}"
                        class="block hover:bg-pink-100 px-4 py-3 rounded-xl">
                            Orders
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.customers') }}"
                        class="block hover:bg-pink-100 px-4 py-3 rounded-xl">
                            Customers
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}"
                        class="block text-red-500 hover:bg-red-50 px-4 py-3 rounded-xl">
                            Logout
                        </a>
                    </li>
                </ul>

            </nav>
        </aside>

        <main class="flex-1">
            @yield('content')
        </main>

    </div>

    @include('components.footer') 


</div>
</body>
</html>
