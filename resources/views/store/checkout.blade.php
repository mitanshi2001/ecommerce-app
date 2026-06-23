@extends('layouts.store')

@section('title', 'Checkout')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Checkout</h1>

    <div class="flex flex-col lg:flex-row gap-8">
        <div class="flex-grow">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Shipping & Billing Information</h2>
                
                <form action="{{ route('checkout.process') }}" method="POST" id="checkout-form">
                    @csrf
                    
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Shipping Address</label>
                        <textarea name="shipping_address" rows="3" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                    </div>
                    
                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Billing Address</label>
                        <textarea name="billing_address" rows="3" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                    </div>

                    <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 mb-8">
                        <div class="flex items-center text-blue-800">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-sm font-medium">Payment is collected upon delivery (Cash on Delivery). No online payment required.</span>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 text-white hover:bg-indigo-700 px-6 py-4 rounded-xl text-lg font-bold shadow-lg shadow-indigo-200 transition-all">
                        Place Order
                    </button>
                </form>
            </div>
        </div>
        
        <div class="lg:w-96">
            <div class="bg-gray-50 rounded-2xl shadow-inner border border-gray-200 p-6 sticky top-24">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Order Summary</h2>
                <ul class="divide-y divide-gray-200 mb-6">
                    @foreach($cart->items as $item)
                        <li class="py-3 flex justify-between text-sm">
                            <div>
                                <span class="font-medium text-gray-900">{{ $item->product->name }}</span>
                                <span class="text-gray-500"> x {{ $item->quantity }}</span>
                            </div>
                            <span class="font-medium text-gray-900">${{ number_format($item->product->price * $item->quantity, 2) }}</span>
                        </li>
                    @endforeach
                </ul>
                <div class="flex justify-between items-center text-xl font-bold text-gray-900 pt-4 border-t border-gray-200">
                    <span>Total</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
