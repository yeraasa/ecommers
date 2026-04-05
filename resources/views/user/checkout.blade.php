@extends('layouts.app')

@section('title', 'MidnightBloom - Checkout')

@section('content')
    <div class="min-h-screen bg-slate-50 py-10">
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- HEADER --}}
            <div class="mb-10 text-center lg:text-left">
                <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-800 tracking-tight">Checkout</h2>
                <p class="text-slate-500 mt-2">Please complete your information to place the order.</p>
            </div>

            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="flex flex-col lg:flex-row gap-8 items-start">

                    {{-- LEFT: SHIPPING INFO --}}
                    <div class="w-full lg:w-[65%] space-y-6">
                        
                        {{-- Shipping Card --}}
                        <div class="bg-white border border-slate-200 rounded-2xl p-6 lg:p-8 shadow-sm">
                            <h3 class="text-xl font-bold mb-6 flex items-center gap-3 text-slate-800">
                                <div class="p-2 bg-primary/10 rounded-lg flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary">local_shipping</span>
                                </div>
                                Shipping Information
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="md:col-span-2">
                                    <label for="address" class="block text-sm font-semibold text-slate-700 mb-2">Full Address</label>
                                    <textarea name="address" id="address" rows="3" required
                                        class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl px-4 py-3 focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none"
                                        placeholder="Street address, apartment, suite, etc."></textarea>
                                </div>

                                <div>
                                    <label for="city" class="block text-sm font-semibold text-slate-700 mb-2">City</label>
                                    <input type="text" name="city" id="city" required
                                        class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl px-4 py-3 focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none"
                                        placeholder="e.g. Jakarta">
                                </div>

                                <div>
                                    <label for="postal_code" class="block text-sm font-semibold text-slate-700 mb-2">Postal Code</label>
                                    <input type="text" name="postal_code" id="postal_code" required
                                        class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl px-4 py-3 focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none"
                                        placeholder="e.g. 12345">
                                </div>

                                <div class="md:col-span-2">
                                    <label for="phone" class="block text-sm font-semibold text-slate-700 mb-2">Phone Number</label>
                                    <input type="text" name="phone" id="phone" required
                                        class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl px-4 py-3 focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none"
                                        placeholder="e.g. +628123456789">
                                </div>
                            </div>
                        </div>

                        {{-- Payment Method Card --}}
                        <div class="bg-white border border-slate-200 rounded-2xl p-6 lg:p-8 shadow-sm">
                            <h3 class="text-xl font-bold mb-6 flex items-center gap-3 text-slate-800">
                                <div class="p-2 bg-primary/10 rounded-lg flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary">payments</span>
                                </div>
                                Payment Method
                            </h3>
                            
                            {{-- Active Payment Option --}}
                            <label class="p-5 border-2 border-primary bg-primary/5 rounded-xl flex items-center justify-between cursor-pointer hover:bg-primary/10 transition-colors">
                                <div class="flex items-center gap-4">
                                    <div class="p-2 bg-white rounded-full shadow-sm">
                                        <span class="material-symbols-outlined text-primary block">account_balance_wallet</span>
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-900 text-base">Cash on Delivery</p>
                                        <p class="text-sm text-slate-500 mt-0.5">Pay when your order arrives.</p>
                                    </div>
                                </div>
                                <span class="material-symbols-outlined text-primary text-2xl">check_circle</span>
                            </label>
                        </div>
                    </div>

                    {{-- RIGHT: ORDER SUMMARY --}}
                    <aside class="w-full lg:w-[35%] lg:sticky lg:top-8">
                        <div class="bg-white border border-slate-200 rounded-2xl p-6 lg:p-8 shadow-md">
                            <h3 class="text-xl font-bold mb-6 text-slate-800 border-b border-slate-100 pb-4">Order Summary</h3>

                            <div class="max-h-80 overflow-y-auto mb-6 pr-2 space-y-5 custom-scrollbar">
                                @foreach($cartItems as $item)
                                    <div class="flex gap-4 items-center group">
                                        <div class="w-16 h-16 shrink-0 overflow-hidden rounded-xl border border-slate-100 bg-slate-50 shadow-sm">
                                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-sm font-bold text-slate-800 truncate">{{ $item->product->name }}</h4>
                                            <p class="text-xs text-slate-500 mt-1">Qty: {{ $item->quantity }}</p>
                                        </div>
                                        <p class="text-sm font-bold text-slate-900">
                                            ${{ number_format($item->product->price * $item->quantity, 2) }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>

                            <div class="border-t border-slate-200 pt-6 space-y-4 mb-8 text-sm">
                                <div class="flex justify-between items-center text-slate-600">
                                    <span>Subtotal</span>
                                    <span class="font-medium">${{ number_format($subtotal, 2) }}</span>
                                </div>
                                <div class="flex justify-between items-center text-slate-600">
                                    <span>Shipping</span>
                                    <span class="font-medium text-green-600">Free</span>
                                </div>
                                <div class="flex justify-between items-center font-bold text-lg pt-2 border-t border-slate-100">
                                    <span class="text-slate-800">Total <span class="text-xs font-normal text-slate-500">(incl. tax)</span></span>
                                    <span class="text-primary">${{ number_format($total, 2) }}</span>
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-emerald-400 text-white font-bold py-4 rounded-xl shadow-lg shadow-primary/30 hover:bg-primary/90 hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">
                                Place Order
                                <span class="material-symbols-outlined text-lg">arrow_forward</span>
                            </button>

                            <a href="{{ route('cart.index') }}" class="block text-center text-sm font-medium text-slate-500 mt-5 hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-sm align-middle mr-1">arrow_back</span>
                                Return to Cart
                            </a>
                        </div>
                    </aside>
                </div>
            </form>
        </main>
    </div>
@endsection