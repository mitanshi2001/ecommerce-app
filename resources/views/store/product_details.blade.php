@extends('layouts.store')

@section('title', $product->name . ' - Luxe')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row">
        <div class="md:w-1/2">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-[30rem] object-cover">
            @else
                <div class="w-full h-[30rem] bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center text-gray-400">No Image Available</div>
            @endif
        </div>
        <div class="md:w-1/2 p-10 flex flex-col justify-center">
            <div class="text-sm text-indigo-600 font-semibold uppercase tracking-wider mb-2">{{ $product->category->name }}</div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
            <div class="text-3xl font-extrabold text-gray-900 mb-6">${{ number_format($product->price, 2) }}</div>
            <p class="text-gray-600 text-lg mb-8 leading-relaxed">{{ $product->description ?? 'No description available for this product.' }}</p>
            
            <div class="flex items-center space-x-4 mb-6">
                <span class="text-sm font-medium {{ $product->stock_quantity > 0 ? 'text-green-600' : 'text-red-600' }}">
                    {{ $product->stock_quantity > 0 ? 'In Stock ('.$product->stock_quantity.' available)' : 'Out of Stock' }}
                </span>
            </div>

            @auth
                @if($product->stock_quantity > 0)
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-indigo-600 text-white hover:bg-indigo-700 px-8 py-4 rounded-xl text-lg font-bold shadow-lg shadow-indigo-200 transition-all transform hover:-translate-y-1">
                            Add to Cart
                        </button>
                    </form>
                @else
                    <button disabled class="w-full bg-gray-400 text-white px-8 py-4 rounded-xl text-lg font-bold cursor-not-allowed">
                        Out of Stock
                    </button>
                @endif
            @else
                <a href="{{ route('login') }}" class="w-full text-center bg-gray-900 text-white hover:bg-gray-800 px-8 py-4 rounded-xl text-lg font-bold transition-all">
                    Log in to Add to Cart
                </a>
            @endauth
        </div>
    </div>
</div>
@endsection
