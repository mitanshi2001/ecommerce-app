<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 font-sans flex h-screen overflow-hidden">
    <aside class="bg-gray-900 text-white w-64 flex-shrink-0 hidden md:flex flex-col">
        <div class="h-16 flex items-center justify-center border-b border-gray-800">
            <h1 class="text-2xl font-bold text-indigo-400">Admin Panel</h1>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">Dashboard</a>
            <a href="{{ route('admin.categories.index') }}" class="block px-4 py-2 rounded text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">Categories</a>
            <a href="{{ route('admin.products.index') }}" class="block px-4 py-2 rounded text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">Products</a>
            <a href="{{ route('admin.orders.index') }}" class="block px-4 py-2 rounded text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">Orders</a>
        </nav>
        <div class="p-4 border-t border-gray-800">
            <a href="{{ route('home') }}" class="block px-4 py-2 text-sm text-gray-400 hover:text-white transition-colors">&larr; Back to Store</a>
        </div>
    </aside>
    
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 shadow-sm">
            <div class="font-semibold text-gray-800 hidden md:block">@yield('header')</div>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-600">Admin: {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-red-600 hover:text-red-800 font-medium">Logout</button>
                </form>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
