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
                        class="block {{ request()->routeIs('admin.dashboard') ? 'bg-pink-500 text-white' : 'hover:bg-pink-100' }} px-4 py-3 rounded-xl">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products') }}"
                        class="block {{ request()->routeIs('admin.products') ? 'bg-pink-500 text-white' : 'hover:bg-pink-100' }} px-4 py-3 rounded-xl">
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.brands') }}"
                        class="block {{ request()->routeIs('admin.brands') ? 'bg-pink-500 text-white' : 'hover:bg-pink-100' }} px-4 py-3 rounded-xl">
                            Brands
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.orders') }}"
                        class="block {{ request()->routeIs('admin.orders') ? 'bg-pink-500 text-white' : 'hover:bg-pink-100' }} px-4 py-3 rounded-xl">
                            Orders
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.customers') }}"
                        class="block {{ request()->routeIs('admin.customers') ? 'bg-pink-500 text-white' : 'hover:bg-pink-100' }} px-4 py-3 rounded-xl">
                            Customers
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full text-left block text-red-500 hover:bg-red-50 px-4 py-3 rounded-xl">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- MAIN CONTENT — bg-pink-50 applied here so ALL pages get the pink background -->
        <main class="flex-1 bg-pink-50">
            @yield('content')
        </main>

    </div>

</body>
</html>
