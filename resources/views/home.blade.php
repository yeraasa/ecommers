@extends('layouts.app')

@section('title', 'PetPal - Modern Home')

@section('content')
    <div class="flex h-screen overflow-hidden">

        {{-- Sidebar --}}
        <aside
            class="w-16 flex flex-col items-center py-6 bg-white dark:bg-background-dark border-r border-border-light dark:border-border-dark z-20">
            <div class="mb-10 text-primary">
                <span class="material-symbols-outlined text-3xl font-bold">pets</span>
            </div>

            <nav class="flex flex-col gap-8">
                <a class="text-primary flex flex-col items-center" href="#">
                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">house</span>
                </a>
                <a class="text-slate-400 hover:text-primary" href="#"><span
                        class="material-symbols-outlined">search</span></a>
                <a class="text-slate-400 hover:text-primary" href="{{ route('cart') }}"><span
                        class="material-symbols-outlined">shopping_cart</span></a>
                <a class="text-slate-400 hover:text-primary" href="#"><span
                        class="material-symbols-outlined">person</span></a>
            </nav>

            <div class="mt-auto">
                <span class="material-symbols-outlined text-slate-400">settings</span>
            </div>
        </aside>

        {{-- Main --}}
        <main class="flex-1 overflow-y-auto h-full">

            {{-- Header --}}
            <header
                class="flex justify-between px-6 py-4 bg-white dark:bg-background-dark/50 sticky top-0 border-b border-border-light dark:border-border-dark">
                <h1 class="font-bold uppercase">PetPal</h1>
                <span class="material-symbols-outlined">notifications</span>
            </header>

            {{-- Daily Essentials --}}
            <section class="px-4 pb-8 mt-4">

                <div class="grid grid-cols-5 gap-2">
                    @foreach ($items as $item)
                        <div class="flex flex-col gap-2">
                            <div class="aspect-square bg-white dark:bg-slate-800 rounded-lg thin-border overflow-hidden">
                                <div class="w-full h-full bg-cover bg-center"
                                    style="background-image: url('{{ asset($item['image']) }}')">
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <p class="text-[9px] font-bold truncate">{{ $item['name'] }}</p>
                                <div class="flex justify-between items-center">
                                    <p class="text-[9px] text-slate-500">${{ $item['price'] }}</p>
                                    <a href="{{ route('cart') }}"
                                        class="bg-primary text-white size-4 flex items-center justify-center rounded-sm">
                                        <span class="material-symbols-outlined text-[10px]">add_shopping_cart</span>

                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </section>

            {{-- Categories --}}
            <section class="px-4">
                <h3 class="font-bold mb-4">Shop by Category</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="h-24 bg-slate-200 rounded-lg flex items-center px-4 font-bold uppercase">Feline</div>
                    <div class="h-24 bg-slate-200 rounded-lg flex items-center px-4 font-bold uppercase">Canine</div>
                </div>
            </section>

            <div class="h-24"></div>
        </main>
    </div>
@endsection
