@extends('layouts.admin')

@section('content')
<main class="p-8">
    <div class="bg-white rounded-3xl shadow-lg p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Customers</h1>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b bg-pink-50 text-gray-700 font-semibold uppercase text-xs">
                        <th class="p-4">Customer ID</th>
                        <th class="p-4">Name</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Phone</th>
                        <th class="p-4">Joined Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($customers as $customer)
                    <tr class="hover:bg-pink-50 transition">
                        <td class="p-4 font-bold">#{{ $customer->customer_id }}</td>
                        <td class="p-4 font-medium">{{ $customer->customer_name }}</td>
                        <td class="p-4 text-gray-500">{{ $customer->email }}</td>
                        <td class="p-4 text-gray-500">{{ $customer->phone ?? 'N/A' }}</td>
                        <td class="p-4 text-gray-400">
                            {{ $customer->created_at ? $customer->created_at->format('d M Y') : 'N/A' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-10 text-gray-400">No customers registered yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection