@extends('layouts.store')

@section('content')
<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 pt-20">
            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Premium products</span>
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600">for modern life</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Discover our curated collection of high-quality items designed to elevate your everyday experience. Shop the latest trends with Luxe.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="{{ route('categories') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg transition-colors">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <div class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full bg-gradient-to-br from-indigo-100 to-purple-200"></div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex justify-between items-baseline mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Latest Arrivals</h2>
        <a href="{{ route('categories') }}" class="text-indigo-600 hover:text-indigo-800 font-medium transition-colors">View all &rarr;</a>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($products as $product)
            <a href="{{ route('product.details', $product->id) }}" class="group block relative overflow-hidden rounded-2xl bg-white shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden bg-gray-200">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-64 object-cover object-center group-hover:opacity-90 transition-opacity">
                    @else
                        <div class="w-full h-64 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                    @endif
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-gray-900 mb-1 truncate">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-500 mb-3">{{ $product->category->name }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
