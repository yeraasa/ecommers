@extends('layouts.app')

@section('title', 'MidnightBloom - Home')

@section('content')
    <div class="">

        {{-- Main --}}
        <main class="flex-1 overflow-y-auto">
            <section class="@container">
                <div class="relative m-4 h-125 min-h-125 flex flex-col justify-end p-8 md:p-16 rounded-xl overflow-hidden group">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105"
                        data-alt="Vibrant spring flower field at dawn"
                        style='background-image: linear-gradient(to right, rgba(16, 34, 31, 0.9) 0%, rgba(16, 34, 31, 0.2) 60%, rgba(16, 34, 31, 0.1) 100%), url("{{ asset('assets/images/tulipanes.jpg') }}")'>
                        <div class="relative flex flex-col justify-center items-center h-full p-4 md:p-16 z-10 max-w-2xl space-y-6">
                            <div class="space-y-2">
                                <h1 class="text-white text-3xl md:text-7xl font-extrabold  leading-tight tracking-tighter">
                                    Spring Bloom <br /><span class="text-primary">Collection</span>
                                </h1>
                                <p class="text-slate-300 text-md md:text-xl font-light max-w-lg leading-relaxed">
                                    Celebrate the season of renewal with our curated selection of fresh, locally sourced
                                    floral
                                    arrangements.
                                </p>
                            </div>
                        </div>
                    </div>
            </section>

            <section class="px-4 pb-8 mt-4">
                {{-- PERUBAHAN ADA DI BARIS BAWAH INI --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-2">
                    @foreach ($items as $item)
                        <a href="{{ route('products.detail', $item->id) }}">
                            <div class="flex flex-col h-auto gap-2 p-4 rounded-lg border border-slate-200">
                                <div class="aspect-square  bg-white dark:bg-slate-800 rounded-lg overflow-hidden">
                                    <div class="w-full h-full bg-cover bg-center">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-full h-full object-cover" />
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col gap-1">
                                        <p class="text-sm font-bold truncate">{{ $item->name }}</p>
                                        <p class="text-xs text-slate-500">${{ number_format($item->price, 2) }}</p>
                                    </div>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <button type="submit" class="bg-emerald-300 p-1.5 pb-0 rounded-md">
                                            <span class="material-symbols-outlined">
                                                add_shopping_cart
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>

            <div class="h-24"></div>
        </main>
    </div>
@endsection
