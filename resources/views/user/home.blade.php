@extends('layouts.app')

@section('title', 'MidnightBloom - Home')

@section('content')
    <div class="">

        {{-- Main --}}
        <main class="flex-1 overflow-y-auto">
            <section class="px-4 pb-8 mt-4">

                <div class="grid grid-cols-5 gap-2">
                    @foreach ($items as $item)
                        <div class="flex flex-col gap-2">
                            <div class="aspect-square bg-white dark:bg-slate-800 rounded-lg thin-border overflow-hidden">
                                <div class="w-full h-full bg-cover bg-center"
                                    style="background-image: url('{{ asset($item->image ?? 'default-product.jpg') }}')">
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <p class="text-base font-bold truncate">{{ $item->name }}</p>
                                <div class="flex justify-between items-center">
                                    <p class="text-base text-slate-500">${{ number_format($item->price, 2) }}</p>

                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <button type="submit"
                                            class="bg-primary text-white size-7 flex items-center justify-center rounded-sm">
                                            <span class="material-symbols-outlined text-base">add_shopping_cart</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </section>


            <div class="h-24"></div>
        </main>
    </div>
@endsection
