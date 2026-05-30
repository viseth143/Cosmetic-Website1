<aside class="w-64 bg-white shadow-xl min-h-screen">
    <div class="p-6 border-b">
        <h1 class="text-3xl font-bold text-pink-500">
            Admin Panel
        </h1>
    </div>
    <nav class="p-6">
        <ul class="space-y-4 font-medium">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="block px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-pink-500 text-white' : 'text-gray-600 hover:bg-pink-100' }}">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('admin.products') }}"
                    class="block px-4 py-3 rounded-xl transition {{ (request()->routeIs('admin.products') || request()->is('admin/products*') || request()->is('admin/add-product*') || request()->is('admin/edit-product*')) ? 'bg-pink-500 text-white' : 'text-gray-600 hover:bg-pink-100' }}">
                    Products
                </a>
            </li>

            <li>
                <a href="{{ route('admin.brands') }}"
                    class="block px-4 py-3 rounded-xl transition {{ (request()->routeIs('admin.brands') || request()->is('admin/brands*') || request()->is('admin/add-brand*') || request()->is('admin/edit-brand*')) ? 'bg-pink-500 text-white' : 'text-gray-600 hover:bg-pink-100' }}">
                    Brands
                </a>
            </li>

            <li>
                <a href="{{ route('admin.orders') }}"
                    class="block px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.orders') ? 'bg-pink-500 text-white' : 'text-gray-600 hover:bg-pink-100' }}">
                    Orders
                </a>
            </li>

            <li>
                <a href="{{ route('admin.customers') }}"
                    class="block px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.customers') ? 'bg-pink-500 text-white' : 'text-gray-600 hover:bg-pink-100' }}">
                    Customers
                </a>
            </li>

            <li>
                <a href="{{ route('admin.users') }}"
                    class="block px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.users') ? 'bg-pink-500 text-white' : 'text-gray-600 hover:bg-pink-100' }}">
                    Users
                </a>
            </li>

            <li>
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit"
                        class="w-full text-left text-red-500 hover:bg-red-50 px-4 py-3 rounded-xl font-medium transition">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</aside>