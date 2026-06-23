@extends('layouts.admin')

@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
        <div class="text-gray-500 text-sm font-medium">Total Orders</div>
        <div class="text-3xl font-bold text-gray-900 mt-2">{{ $ordersCount }}</div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
        <div class="text-gray-500 text-sm font-medium">Total Products</div>
        <div class="text-3xl font-bold text-gray-900 mt-2">{{ $productsCount }}</div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
        <div class="text-gray-500 text-sm font-medium">Categories</div>
        <div class="text-3xl font-bold text-gray-900 mt-2">{{ $categoriesCount }}</div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
        <div class="text-gray-500 text-sm font-medium">Customers</div>
        <div class="text-3xl font-bold text-gray-900 mt-2">{{ $usersCount }}</div>
    </div>
</div>

<div class="bg-white shadow-sm border border-gray-100 rounded-lg">
    <div class="px-6 py-4 border-b border-gray-100">
        <h2 class="text-lg font-medium text-gray-900">Recent Orders</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($recentOrders as $order)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#{{ $order->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{ number_format($order->total_amount, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $order->status == 'Completed' ? 'bg-green-100 text-green-800' : ($order->status == 'Processing' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
