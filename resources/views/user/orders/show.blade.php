@extends('layouts.app')

@section('title', 'MidnightBloom - Order #{{ $order->id }}')

@section('content')
    <div class="min-h-screen bg-slate-50 py-10">
        <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- BACK BUTTON --}}
            <a href="{{ route('orders.index') }}"
                class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-primary transition-colors mb-8">
                <span class="material-symbols-outlined text-base">arrow_back</span>
                Back to My Orders
            </a>

            {{-- HEADER --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">Order #{{ $order->id }}</h2>
                    <p class="text-slate-500 mt-1 text-sm">
                        Placed on {{ $order->created_at->format('d M Y, H:i') }}
                    </p>
                </div>
                @php
                    $statusColors = [
                        'pending'   => 'bg-amber-100 text-amber-700',
                        'shipped'   => 'bg-blue-100 text-blue-700',
                        'delivered' => 'bg-emerald-100 text-emerald-700',
                        'completed' => 'bg-emerald-100 text-emerald-700',
                        'cancelled' => 'bg-red-100 text-red-600',
                    ];
                    $colorClass = $statusColors[$order->status] ?? 'bg-slate-100 text-slate-600';
                @endphp
                <span class="px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wide {{ $colorClass }} self-start sm:self-auto">
                    {{ ucfirst($order->status) }}
                </span>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 items-start">

                {{-- LEFT: ORDER ITEMS --}}
                <div class="w-full lg:w-[65%]">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                        <div class="px-6 py-5 border-b border-slate-100 flex items-center gap-3">
                            <div class="p-2 bg-primary/10 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary" style="font-variation-settings:'FILL' 1">shopping_bag</span>
                            </div>
                            <h3 class="text-lg font-bold text-slate-800">Order Items</h3>
                        </div>

                        <div class="divide-y divide-slate-100">
                            @foreach ($order->OrderItem as $item)
                                <div class="flex gap-4 items-center p-5 group">
                                    <div class="w-20 h-20 shrink-0 overflow-hidden rounded-xl border border-slate-100 bg-slate-50 shadow-sm">
                                        @if ($item->product && $item->product->image)
                                            <img src="{{ asset('storage/' . $item->product->image) }}"
                                                alt="{{ $item->product->name }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <span class="material-symbols-outlined text-slate-300 text-3xl">image_not_supported</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-bold text-slate-800 truncate">
                                            {{ $item->product->name ?? 'Product Unavailable' }}
                                        </h4>
                                        <p class="text-xs text-slate-400 mt-1">
                                            Qty: <span class="font-semibold text-slate-600">{{ $item->quantity }}</span>
                                        </p>
                                        <p class="text-xs text-slate-400 mt-0.5">
                                            Unit price: <span class="font-semibold text-slate-600">${{ number_format($item->price, 2) }}</span>
                                        </p>
                                    </div>

                                    <p class="text-sm font-extrabold text-slate-900 shrink-0">
                                        ${{ number_format($item->price * $item->quantity, 2) }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- RIGHT: SUMMARY SIDEBAR --}}
                <div class="w-full lg:w-[35%] space-y-6 lg:sticky lg:top-8">

                    {{-- Order Summary Card --}}
                    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-4 mb-5">Order Summary</h3>

                        <div class="space-y-3 text-sm mb-5">
                            <div class="flex justify-between text-slate-600">
                                <span>Subtotal</span>
                                <span class="font-medium">${{ number_format($order->total_price / 1.1, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-slate-600">
                                <span>Tax (10%)</span>
                                <span class="font-medium">${{ number_format($order->total_price - ($order->total_price / 1.1), 2) }}</span>
                            </div>
                            <div class="flex justify-between text-slate-600">
                                <span>Shipping</span>
                                <span class="font-medium text-emerald-600">Free</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center font-bold text-lg border-t border-slate-100 pt-4">
                            <span class="text-slate-800">Total</span>
                            <span class="text-primary">${{ number_format($order->total_price, 2) }}</span>
                        </div>
                    </div>

                    {{-- Shipping Info Card --}}
                    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-4 mb-5 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">local_shipping</span>
                            Shipping Details
                        </h3>
                        <div class="space-y-3 text-sm text-slate-600">
                            <div>
                                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-0.5">Address</p>
                                <p class="font-medium text-slate-700">{{ $order->address }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-0.5">City</p>
                                <p class="font-medium text-slate-700">{{ $order->city }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-0.5">Postal Code</p>
                                <p class="font-medium text-slate-700">{{ $order->postal_code }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-0.5">Phone</p>
                                <p class="font-medium text-slate-700">{{ $order->phone }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>
@endsection
