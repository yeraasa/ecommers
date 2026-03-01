@extends('layouts.app')

@section('title', 'MidnightBloom - Category')

@section('content')

    <!-- Hero Search Section -->
    <main class="flex-1">
        <div class="max-w-5xl mx-auto px-6 pt-16 pb-12 text-center">
            <h1 class="text-slate-900 dark:text-slate-100 text-4xl md:text-5xl font-extrabold mb-6 tracking-tight">
                Find your perfect bloom</h1>
            <div class="max-w-2xl mx-auto relative group">
                <div
                    class="flex items-center bg-white dark:bg-slate-800 shadow-xl shadow-primary/5 rounded-2xl overflow-hidden border-2 border-transparent focus-within:border-primary transition-all duration-300">
                    <div class="pl-6 text-slate-400">
                        <span class="material-symbols-outlined">search</span>
                    </div>
                    <input
                        class="w-full py-5 px-4 text-lg bg-transparent border-none focus:ring-0 text-slate-800 dark:text-slate-100 placeholder:text-slate-400 font-medium"
                        placeholder="Search for flowers, fertilizers, or tools..." type="text" />
                    <div class="pr-2">
                        <button
                            class="bg-primary hover:bg-primary/90 text-white px-8 py-3 rounded-xl font-bold transition-all shadow-lg shadow-primary/20">
                            Search
                        </button>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-sm">
                <span class="text-slate-500 font-medium">Trending:</span>
                <a class="text-primary hover:underline decoration-2 underline-offset-4" href="#">Tulips</a>
                <span class="text-slate-300">•</span>
                <a class="text-primary hover:underline decoration-2 underline-offset-4" href="#">Ceramic
                    Pots</a>
                <span class="text-slate-300">•</span>
                <a class="text-primary hover:underline decoration-2 underline-offset-4" href="#">Organic
                    Soil</a>
            </div>
        </div>
        <!-- Browse by Category Section -->
        <section class="max-w-7xl mx-auto px-6 py-12">
            <div class="flex items-center justify-between mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-slate-100 tracking-tight">Browse
                    by Category</h2>
            </div>
            <!-- Category Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Fresh Flowers -->
                <div
                    class="group relative h-72 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 transition-transform duration-700 group-hover:scale-110">
                        <img src="{{ asset('assets/images/flower.jpg') }}" alt="flower"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent">
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-white text-2xl font-bold mb-1">Fresh Flowers</h3>
                        <p class="text-white/80 text-sm font-medium">Directly from the field</p>
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-white/20 backdrop-blur-md rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-white">trending_flat</span>
                    </div>
                </div>
                <!-- Potted Plants -->
                <div
                    class="group relative h-72 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 transition-transform duration-700 group-hover:scale-110">
                        <img src="{{ asset('assets/images/potted plants.jpg') }}" alt="potted plants"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent">
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-white text-2xl font-bold mb-1">Potted Plants</h3>
                        <p class="text-white/80 text-sm font-medium">Lush indoor greenery</p>
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-white/20 backdrop-blur-md rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-white">trending_flat</span>
                    </div>
                </div>
                <!-- Gardening Tools -->
                <div
                    class="group relative h-72 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 transition-transform duration-700 group-hover:scale-110">
                        <img src="{{ asset('assets/images/garden tools.jpg') }}" alt="garden tools"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent">
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-white text-2xl font-bold mb-1">Gardening Tools</h3>
                        <p class="text-white/80 text-sm font-medium">Premium craft equipment</p>
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-white/20 backdrop-blur-md rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-white">trending_flat</span>
                    </div>
                </div>
                <!-- Fertilizers -->
                <div
                    class="group relative h-72 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 transition-transform duration-700 group-hover:scale-110">
                        <img src="{{ asset('assets/images/pupuk.jpg') }}" alt="pupuk"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent">
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-white text-2xl font-bold mb-1">Fertilizers</h3>
                        <p class="text-white/80 text-sm font-medium">Organic nutrients for growth</p>
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-white/20 backdrop-blur-md rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-white">trending_flat</span>
                    </div>
                </div>
                <!-- Gift Buckets -->
                <div
                    class="group relative h-72 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 transition-transform duration-700 group-hover:scale-110">
                        <img src="{{ asset('assets/images/bucket.jpg') }}" alt=" bucket"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent">
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-white text-2xl font-bold mb-1">Gift Buckets</h3>
                        <p class="text-white/80 text-sm font-medium">Curated for special moments</p>
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-white/20 backdrop-blur-md rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-white">trending_flat</span>
                    </div>
                </div>
                <!-- Seeds -->
                <div
                    class="group relative h-72 rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 transition-transform duration-700 group-hover:scale-110">
                        <img src="{{ asset('assets/images/seeds.jpg') }}" alt="seeds" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent">
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-white text-2xl font-bold mb-1">Seeds</h3>
                        <p class="text-white/80 text-sm font-medium">Start your garden today</p>
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-white/20 backdrop-blur-md rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-white">trending_flat</span>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
