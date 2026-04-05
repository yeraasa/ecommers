@extends('layouts.app')

@section('title', 'MidnightBloom - Checkout')

@section('content')

    <body class="bg-background text-on-surface font-body selection:bg-primary selection:text-on-primary">
        <main class="pt-10 min-h-screen">
            <!-- Product Hero Section -->
            <section class="max-w-7xl mx-auto px-8 grid grid-cols-1 md:grid-cols-12 gap-12 pb-24">
                <!-- Left Side: Product Image -->
                <div class="md:col-span-7 space-y-4">
                    <div class="relative rounded-2xl overflow-hidden bg-surface-container-low group">
                        <img alt="Midnight Rose Bouquet"
                            class="object-cover transform transition-transform duration-700 group-hover:scale-105"
                            src="{{ asset('storage/' . $item->image) }}" />
                        <div class="absolute inset-0 bg-linear-to-t from-background/60 to-transparent"></div>
                    </div>

                </div>
                <!-- Right Side: Product Details -->
                <div class="md:col-span-5 flex flex-col pt-4">
                    <header class="mb-8">
                        <h1 class="text-3xl font-extrabold tracking-tight text-on-background mb-2">
                            {{ $item->name }}
                        </h1>
                        <div class="flex items-center gap-4 mb-4">
                            <span class="text-2xl font-bold text-primary">$ {{ $item->price }}</span>
                            <div class="h-4 w-px bg-primary/20"></div>
                        </div>
                    </header>
                    <!-- Tabs-like Bento Section -->
                    <div class="space-y-6">
                        <div class="bg-primary/5 rounded-xl p-6 border border-slate-200">
                            <h3 class="text-xs font-black uppercase tracking-widest text-primary mb-3">Description
                            </h3>
                            <p class="text-sm leading-relaxed text-on-surface-variant">
                                {{ $item->description }}
                            </p>
                        </div>
                        <div
                            class="bg-surface-container border-slate border-primary/10 bg-emerald-400 rounded-xl p-4 flex flex-col items-center text-center">
                            <span
                                class="text-base font-bold uppercase tracking-widest text-on-surface">{{ $item->category }}</span>
                        </div>
                        <div class="space-y-4">
                            <h3 class="text-xs font-black uppercase tracking-widest text-primary">Care Instructions</h3>
                            <ul class="space-y-3">
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-primary text-lg"
                                        data-icon="dark_mode">dark_mode</span>
                                    <span class="text-sm text-on-surface-variant">Keep in low to indirect light to maintain
                                        deep pigment.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-primary text-lg"
                                        data-icon="opacity">opacity</span>
                                    <span class="text-sm text-on-surface-variant">Mist with distilled water every 3 nights
                                        at midnight.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-primary text-lg"
                                        data-icon="thermostat">thermostat</span>
                                    <span class="text-sm text-on-surface-variant">Optimal temperature: 18°C - 22°C.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Action Button -->
                    <div class="flex flex-col mt-8">
                        <div class="flex items-center gap-4">
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <div class="">
                                    <button class="flex items-center bg-surface-container border border-slate-200 rounded-lg p-2 text-primary py-3 hover:bg-emerald-400 transition-colors">
                                        <span class="material-symbols-outlined"> add_shopping_cart </span>
                                        Add to Cart
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>

@endsection