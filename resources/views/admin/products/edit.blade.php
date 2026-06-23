@extends('layouts.admin')
@section('header', 'Edit Product')
@section('content')
<div class="bg-white p-6 rounded shadow-sm max-w-lg">
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-medium">Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="mt-1 block w-full rounded border-gray-300" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium">Category</label>
            <select name="category_id" class="mt-1 block w-full rounded border-gray-300" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4 flex gap-4">
            <div class="flex-1">
                <label class="block text-sm font-medium">Price</label>
                <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="mt-1 block w-full rounded border-gray-300" required>
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium">Stock</label>
                <input type="number" name="stock_quantity" value="{{ $product->stock_quantity }}" class="mt-1 block w-full rounded border-gray-300" required>
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium">Description</label>
            <textarea name="description" class="mt-1 block w-full rounded border-gray-300">{{ $product->description }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium">Image</label>
            <input type="file" name="image" class="mt-1 block w-full">
            @if($product->image) <img src="{{ asset('storage/'.$product->image) }}" class="mt-2 w-20 h-20 rounded object-cover"> @endif
        </div>
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
