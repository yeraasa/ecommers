@extends('layouts.app')

@section('title', 'PetPal - Cart')

@section('content')
    <main class="max-w-7xl mx-auto px-4 py-8">

        {{-- Header --}}
        <div class="mb-8">
            <h2 class="text-3xl font-bold">Your Shopping Cart</h2>
            <p class="text-sm text-gray-500 mt-1">
                Review your items before checking out.
            </p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8 items-start">

            {{-- LEFT: CART ITEMS --}}
            <div class="w-full lg:w-[70%]">

                @forelse($cartItems as $item)
                    <div class="border-b border-gray-200 py-6">

                        <div class="flex gap-6 items-center">
                            <div class="aspect-square w-32 h-32 rounded-xl bg-cover bg-center"
                                style="background-image:url('{{ $item->product->image }}')">
                            </div>

                            <div class="flex flex-1 justify-between gap-4">
                                <div>
                                    <h3 class="text-lg font-semibold">
                                        {{ $item->product->name }}
                                    </h3>
                                    <p class="text-sm text-gray-500">
                                        {{ $item->product->variant ?? '-' }}
                                    </p>
                                    <p class="text-sm font-medium text-primary mt-1">
                                        ${{ number_format($item->product->price, 2) }} / unit
                                    </p>
                                </div>

                                {{-- QTY CONTROL --}}
                                <div class="flex flex-col items-end gap-3">
                                    <div class="flex items-center gap-3 bg-white border p-1 rounded-lg">

                                        {{-- MINUS --}}
                                        <form method="POST" action="{{ route('cart.update', $item) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="action" value="minus">
                                            <button class="w-8 h-8">−</button>
                                        </form>

                                        <span class="w-8 text-center font-bold">
                                            {{ $item->quantity }}
                                        </span>

                                        {{-- PLUS --}}
                                        <form method="POST" action="{{ route('cart.update', $item) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="action" value="plus">
                                            <button class="w-8 h-8">+</button>
                                        </form>
                                    </div>

                                    <p class="text-lg font-bold">
                                        ${{ number_format($item->product->price * $item->quantity, 2) }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- DELETE --}}
                        <div class="flex justify-end mt-4">
                            <form method="POST" action="{{ route('cart.destroy', $item) }}">
                                @csrf
                                @method('DELETE')
                                <button class="flex items-center gap-2 text-xs font-bold text-gray-400 hover:text-red-500">
                                    <span class="material-symbols-outlined text-sm">delete</span>
                                    Remove
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Cart kamu masih kosong 🛒</p>
                @endforelse

            </div>

            {{-- RIGHT: SUMMARY --}}
            <aside class="w-full lg:w-[30%] lg:sticky lg:top-24">
                <div class="bg-white border rounded-xl p-6">
                    <h3 class="text-xl font-bold mb-6">Order Summary</h3>

                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Subtotal</span>
                            <span>${{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Tax</span>
                            <span>${{ number_format($tax, 2) }}</span>
                        </div>
                    </div>

                    <div class="flex justify-between mb-6">
                        <span class="text-lg font-bold">Total</span>
                        <span class="text-2xl font-bold text-primary">
                            ${{ number_format($total, 2) }}
                        </span>
                    </div>

                    <button class="w-full bg-primary text-white font-bold py-4 rounded-xl">
                        Proceed to Checkout
                    </button>
                </div>
            </aside>

        </div>
    </main>
@endsection
