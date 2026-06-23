@extends('layouts.admin')
@section('header', 'Order Details')
@section('content')
<div class="mb-4">
    <a href="{{ route('admin.orders.index') }}" class="text-indigo-600 hover:underline">&larr; Back to Orders</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="md:col-span-2 space-y-6">
        <div class="bg-white p-6 rounded shadow-sm border border-gray-100">
            <h3 class="text-lg font-medium mb-4">Order Items</h3>
            <ul class="divide-y divide-gray-200">
                @foreach($order->items as $item)
                <li class="py-3 flex justify-between text-sm">
                    <div>
                        <span class="font-medium text-gray-900">{{ $item->product->name }}</span>
                        <span class="text-gray-500"> x {{ $item->quantity }}</span>
                    </div>
                    <span class="font-medium text-gray-900">${{ number_format($item->price * $item->quantity, 2) }}</span>
                </li>
                @endforeach
            </ul>
            <div class="flex justify-between items-center text-lg font-bold text-gray-900 pt-4 border-t border-gray-200 mt-4">
                <span>Total Amount</span>
                <span>${{ number_format($order->total_amount, 2) }}</span>
            </div>
        </div>
    </div>
    <div class="space-y-6">
        <div class="bg-white p-6 rounded shadow-sm border border-gray-100">
            <h3 class="text-lg font-medium mb-4">Customer Details</h3>
            <p><strong>Name:</strong> {{ $order->user->name }}</p>
            <p><strong>Email:</strong> {{ $order->user->email }}</p>
            <hr class="my-4">
            <p><strong>Shipping:</strong><br>{{ $order->shipping_address }}</p>
            <p class="mt-2"><strong>Billing:</strong><br>{{ $order->billing_address }}</p>
        </div>

        <div class="bg-white p-6 rounded shadow-sm border border-gray-100">
            <h3 class="text-lg font-medium mb-4">Update Status</h3>
            <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                @csrf @method('PUT')
                <select name="status" class="block w-full rounded border-gray-300 mb-4">
                    <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                    <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
                <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded">Update Status</button>
            </form>
        </div>
    </div>
</div>
@endsection
