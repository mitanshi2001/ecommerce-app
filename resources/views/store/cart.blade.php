@extends('layouts.store')

@section('title', 'Your Cart')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Shopping Cart</h1>

    @if(!$cart || $cart->items->count() == 0)
        <div class="bg-white rounded-2xl shadow-sm p-12 text-center border border-gray-100">
            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Your cart is empty</h3>
            <p class="text-gray-500 mb-6">Looks like you haven't added anything to your cart yet.</p>
            <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-indigo-600 hover:bg-indigo-700 shadow-md shadow-indigo-200 transition-colors">Start Shopping</a>
        </div>
    @else
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="flex-grow">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <ul class="divide-y divide-gray-200">
                        @foreach($cart->items as $item)
                            <li class="p-6 flex items-center gap-6">
                                <div class="w-24 h-24 flex-shrink-0 bg-gray-200 rounded-lg overflow-hidden">
                                    @if($item->product->image)
                                        <img src="{{ asset('storage/' . $item->product->image) }}" class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <div class="flex-grow">
                                    <h3 class="text-lg font-semibold text-gray-900"><a href="{{ route('product.details', $item->product->id) }}">{{ $item->product->name }}</a></h3>
                                    <p class="text-indigo-600 font-medium mb-2">${{ number_format($item->product->price, 2) }}</p>
                                    
                                    <div class="flex items-center gap-4">
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center">
                                            @csrf
                                            @method('PATCH')
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm text-center">
                                            <button type="submit" class="ml-2 text-sm text-indigo-600 hover:text-indigo-800">Update</button>
                                        </form>
                                        
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm text-red-600 hover:text-red-800">Remove</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="text-xl font-bold text-gray-900">
                                    ${{ number_format($item->product->price * $item->quantity, 2) }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
            <div class="lg:w-96">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-24">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Order Summary</h2>
                    <div class="flex justify-between items-center mb-4 text-gray-600">
                        <span>Subtotal</span>
                        <span class="font-medium text-gray-900">${{ number_format($cart->items->sum(function($item) { return $item->product->price * $item->quantity; }), 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center mb-6 text-gray-600 pb-6 border-b border-gray-100">
                        <span>Shipping</span>
                        <span class="font-medium text-green-600">Free</span>
                    </div>
                    <div class="flex justify-between items-center mb-8 text-xl font-bold text-gray-900">
                        <span>Total</span>
                        <span>${{ number_format($cart->items->sum(function($item) { return $item->product->price * $item->quantity; }), 2) }}</span>
                    </div>
                    
                    <a href="{{ route('checkout.index') }}" class="w-full block text-center bg-indigo-600 text-white hover:bg-indigo-700 px-6 py-4 rounded-xl text-lg font-bold shadow-lg shadow-indigo-200 transition-all">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
