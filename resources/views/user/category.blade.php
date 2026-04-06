@extends('layouts.app')

@section('title', 'MidnightBloom - Category')

@section('content')

    <!-- Hero Search Section -->
    <main class="flex-1">
        <div class="max-w-5xl mx-auto px-6 pt-16 pb-12 text-center">
            <h1 class="text-slate-900 text-4xl md:text-5xl font-extrabold mb-6 tracking-tight">
                Find your perfect bloom</h1>
            <div class="max-w-2xl mx-auto relative group">
                <form action="{{ route('products.search') }}" method="GET">
                    <div
                        class="flex items-center bg-white shadow-xl shadow-primary/5 rounded-2xl overflow-hidden border-2 border-transparent focus-within:border-primary transition-all duration-300">
                        <div class="pl-6 text-slate-400">
                            <span class="material-symbols-outlined">search</span>
                        </div>
                        <input
                            name="query"
                            class="w-full py-5 px-4 text-lg bg-transparent border-none focus:ring-0 focus:outline-0 text-slate-800 placeholder:text-slate-400 font-medium"
                            placeholder="Search for flowers, fertilizers, or tools..." type="text" />
                    </div>
                </form>
            </div>
        </div>

        @if (isset($items) && $items->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-2 mx-auto max-w-7xl px-6">
                @foreach ($items as $item)
                    <div class="flex flex-col h-auto gap-2 p-4 rounded-lg border border-slate-200 dark:border-slate-700">
                        <div class="aspect-square bg-white dark:bg-slate-800 rounded-lg overflow-hidden">
                            <div class="w-full h-full bg-cover bg-center">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" />
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-base font-bold truncate">{{ $item->name }}</p>
                            <div class="flex flex-col justify-center">
                                <p class="text-base text-slate-500">${{ number_format($item->price, 2) }}</p>
                            </div>
                        </div>
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <button type="submit" class="bg-emerald-300 p-1.5 pb-0 rounded-md">
                                <span class="material-symbols-outlined">add_shopping_cart</span>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @elseif(isset($items) && (request()->has('category') || request()->has('query')))
            <div class="col-span-full text-center text-slate-500 my-8">
                <p>No products found.</p>
            </div>
        @endif

        <!-- Browse by Category Section -->
        <section class="max-w-7xl mx-auto px-6 py-12">
            <div class="flex items-center justify-between mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-slate-100 tracking-tight">Browse
                    by Category</h2>
            </div>
            <!-- Category Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Fresh Flowers -->
                <a href="{{ route('category.index', ['category' => 'Fresh Flowers']) }}"
                    class="block group relative h-72 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 transition-transform duration-700 group-hover:scale-110">
                        <img src="{{ asset('assets/images/flower.jpg') }}" alt="flower"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-linear-to-t from-slate-900/80 via-slate-900/20 to-transparent">
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-white text-2xl font-bold mb-1">Fresh Flowers</h3>
                        <p class="text-white/80 text-sm font-medium">Directly from the field</p>
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-white/20 backdrop-blur-md rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-white">trending_flat</span>
                    </div>
                </a>
                <!-- Potted Plants -->
                <a href="{{ route('category.index', ['category' => 'Potted Plants']) }}"
                    class="block group relative h-72 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 transition-transform duration-700 group-hover:scale-110">
                        <img src="{{ asset('assets/images/potted plants.jpg') }}" alt="potted plants"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-linear-to-t from-slate-900/80 via-slate-900/20 to-transparent">
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-white text-2xl font-bold mb-1">Potted Plants</h3>
                        <p class="text-white/80 text-sm font-medium">Lush indoor greenery</p>
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-white/20 backdrop-blur-md rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-white">trending_flat</span>
                    </div>
                </a>
                <!-- Gardening Tools -->
                <a href="{{ route('category.index', ['category' => 'Gardening Tools']) }}"
                    class="block group relative h-72 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 transition-transform duration-700 group-hover:scale-110">
                        <img src="{{ asset('assets/images/garden tools.jpg') }}" alt="garden tools"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-linear-to-t from-slate-900/80 via-slate-900/20 to-transparent">
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-white text-2xl font-bold mb-1">Gardening Tools</h3>
                        <p class="text-white/80 text-sm font-medium">Premium craft equipment</p>
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-white/20 backdrop-blur-md rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-white">trending_flat</span>
                    </div>
                </a>
                <!-- Fertilizers -->
                <a href="{{ route('category.index', ['category' => 'Fertilizers']) }}"
                    class="block group relative h-72 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 transition-transform duration-700 group-hover:scale-110">
                        <img src="{{ asset('assets/images/pupuk.jpg') }}" alt="pupuk" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-linear-to-t from-slate-900/80 via-slate-900/20 to-transparent">
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-white text-2xl font-bold mb-1">Fertilizers</h3>
                        <p class="text-white/80 text-sm font-medium">Organic nutrients for growth</p>
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-white/20 backdrop-blur-md rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-white">trending_flat</span>
                    </div>
                </a>
                <!-- Gift Buckets -->
                <a href="{{ route('category.index', ['category' => 'Gift Buckets']) }}"
                    class="block group relative h-72 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 transition-transform duration-700 group-hover:scale-110">
                        <img src="{{ asset('assets/images/bucket.jpg') }}" alt=" bucket"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-linear-to-t from-slate-900/80 via-slate-900/20 to-transparent">
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-white text-2xl font-bold mb-1">Gift Buckets</h3>
                        <p class="text-white/80 text-sm font-medium">Curated for special moments</p>
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-white/20 backdrop-blur-md rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-white">trending_flat</span>
                    </div>
                </a>
                <!-- Seeds -->
                <a href="{{ route('category.index', ['category' => 'Seeds']) }}"
                    class="block group relative h-72 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 transition-transform duration-700 group-hover:scale-110">
                        <img src="{{ asset('assets/images/seeds.jpg') }}" alt="seeds"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-linear-to-t from-slate-900/80 via-slate-900/20 to-transparent">
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-white text-2xl font-bold mb-1">Seeds</h3>
                        <p class="text-white/80 text-sm font-medium">Start your garden today</p>
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-white/20 backdrop-blur-md rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-white">trending_flat</span>
                    </div>
                </a>
            </div>
        </section>
    </main>

@endsection
