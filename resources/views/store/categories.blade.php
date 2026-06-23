@extends('layouts.store')

@section('title', 'Categories')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-2">Shop by Category</h1>
    <p class="text-gray-500 text-lg mb-12">Find exactly what you're looking for by browsing our curated categories.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach($categories as $category)
            <a href="{{ route('category.products', $category->id) }}" class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 p-8 shadow-lg transition-transform transform hover:-translate-y-1 hover:shadow-2xl h-48 flex flex-col justify-end">
                <div class="absolute inset-0 bg-black opacity-20 group-hover:opacity-10 transition-opacity"></div>
                <div class="relative z-10">
                    <h2 class="text-2xl font-bold text-white mb-1">{{ $category->name }}</h2>
                    <p class="text-indigo-100 text-sm">{{ $category->products()->count() }} Products</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
