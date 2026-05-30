@extends('layouts.admin')

@section('content')
<main class="p-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Manage Access / Staff</h1>

    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-700 font-medium rounded-xl border border-green-200">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="mb-4 p-4 bg-red-100 text-red-700 font-medium rounded-xl border border-red-200">
        {{ session('error') }}
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <div class="bg-white p-6 rounded-2xl shadow-xl">
            <h2 class="text-xl font-bold text-pink-500 mb-4">
                <i class="fa-solid fa-user-shield mr-2"></i>Current Admins
            </h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b text-gray-400 font-semibold uppercase text-xs">
                            <th class="py-3">Name</th>
                            <th class="py-3">Email</th>
                            <th class="py-3 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach($admins as $admin)
                        <tr>
                            <td class="py-4 font-medium">{{ $admin->name }}</td>
                            <td class="py-4 text-gray-500">{{ $admin->email }}</td>
                            <td class="py-4 text-right">
                                <form action="{{ route('admin.users.removeAdmin', $admin->id) }}" method="POST"
                                    onsubmit="return confirm('Revoke admin access?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold text-xs">
                                        Revoke Admin
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-xl">
            <h2 class="text-xl font-bold text-gray-800 mb-4">
                <i class="fa-solid fa-users mr-2"></i>Promote Customers
            </h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b text-gray-400 font-semibold uppercase text-xs">
                            <th class="py-3">Customer Name</th>
                            <th class="py-3">Email</th>
                            <th class="py-3 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach($customers as $customer)
                        <tr>
                            <td class="py-4 font-medium">{{ $customer->customer_name }}</td>
                            <td class="py-4 text-gray-500">{{ $customer->email }}</td>
                            <td class="py-4 text-right">
                                <form action="{{ route('admin.users.makeAdmin', $customer->customer_id) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="bg-pink-500 text-white px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-pink-600 transition">
                                        Assign Admin
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>
@endsection