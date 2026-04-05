@extends('layouts.app')

@section('title', 'MidnightBloom - Checkout')

@section('content')
    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="mb-8 text-center lg:text-left">
            <h2 class="text-3xl font-bold">Checkout</h2>
            <p class="text-sm text-gray-500 mt-1">Please complete your information to place the order.</p>
        </div>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="flex flex-col lg:flex-row gap-8 items-start">

                {{-- LEFT: SHIPPING INFO --}}
                <div class="w-full lg:w-[65%] space-y-6">
                    <div class="bg-white border- rounded-xl p-6 shadow-sm">
                        <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">local_shipping</span>
                            Shipping Information
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Full Address</label>
                                <textarea name="address" id="address" rows="3" required
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-primary focus:ring-primary"
                                    placeholder="Street address, apartment, suite, etc."></textarea>
                            </div>

                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
                                <input type="text" name="city" id="city" required
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-primary focus:ring-primary"
                                    placeholder="e.g. Jakarta">
                            </div>

                            <div>
                                <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-1">Postal Code</label>
                                <input type="text" name="postal_code" id="postal_code" required
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-primary focus:ring-primary"
                                    placeholder="e.g. 12345">
                            </div>

                            <div class="md:col-span-2">
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                <input type="text" name="phone" id="phone" required
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-primary focus:ring-primary"
                                    placeholder="e.g. +628123456789">
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border rounded-xl p-6 shadow-sm">
                        <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">payments</span>
                            Payment Method
                        </h3>
                        <div class="p-4 border-2 border-primary bg-primary/5 rounded-lg flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">account_balance_wallet</span>
                                <div>
                                    <p class="font-bold text-gray-900">Cash on Delivery</p>
                                    <p class="text-xs text-gray-500">Pay when your order arrives.</p>
                                </div>
                            </div>
                            <span class="material-symbols-outlined text-primary">check_circle</span>
                        </div>
                    </div>
                </div>

                {{-- RIGHT: ORDER SUMMARY --}}
                <aside class="w-full lg:w-[35%] lg:sticky lg:top-24">
                    <div class="bg-white border rounded-xl p-6 shadow-sm">
                        <h3 class="text-xl font-bold mb-6">Order Summary</h3>

                        <div class="max-h-64 overflow-y-auto mb-6 pr-2 space-y-4">
                            @foreach($cartItems as $item)
                                <div class="flex gap-4 items-center">
                                    <div class="w-16 h-16 shrink-0 overflow-hidden rounded-lg border bg-gray-50">
                                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}"
                                            class="w-full h-full object-cover" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-bold truncate">{{ $item->product->name }}</h4>
                                        <p class="text-xs text-gray-500">Qty: {{ $item->quantity }}</p>
                                    </div>
                                    <p class="text-sm font-bold">
                                        ${{ number_format($item->product->price * $item->quantity, 2) }}
                                    </p>
                                </div>
                            @endforeach
                        </div>

                        <div class="border-t pt-6 space-y-4 mb-6 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Subtotal</span>
                                <span>${{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between font-bold text-primary">
                                <span>Total (incl. 10% tax)</span>
                                <span class="text-lg">${{ number_format($total, 2) }}</span>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-primary text-white font-bold py-4 rounded-xl hover:bg-opacity-90 transition-all flex items-center justify-center gap-2">
                            Place Order
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>

                        <a href="{{ route('cart.index') }}" class="block text-center text-sm text-gray-500 mt-4 hover:underline">
                            Back to Cart
                        </a>
                    </div>
                </aside>
            </div>
        </form>
    </main>
@endsection
