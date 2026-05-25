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
                    <a href="#"
                       class="block hover:bg-pink-100 px-4 py-3 rounded-xl">
                        Reviews
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
