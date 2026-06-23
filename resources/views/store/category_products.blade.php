@extends('layouts.store')

@section('title', $category->name . ' Products')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900">{{ $category->name }}</h1>
            @if($category->description)
                <p class="text-gray-500 mt-2">{{ $category->description }}</p>
            @endif
        </div>
        <a href="{{ route('categories') }}" class="text-indigo-600 hover:text-indigo-800 font-medium transition-colors">&larr; All Categories</a>
    </div>

    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            @foreach($products as $product)
                <a href="{{ route('product.details', $product->id) }}" class="group block relative overflow-hidden rounded-2xl bg-white shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100">
                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden bg-gray-200">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-64 object-cover object-center group-hover:opacity-90 transition-opacity">
                        @else
                            <div class="w-full h-64 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                        @endif
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-900 mb-1 truncate">{{ $product->name }}</h3>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        {{ $products->links() }}
    @else
        <div class="bg-gray-50 rounded-2xl border border-gray-200 p-12 text-center">
            <p class="text-gray-500 text-lg">No products found in this category.</p>
        </div>
    @endif
</div>
@endsection
