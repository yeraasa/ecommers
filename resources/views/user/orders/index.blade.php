@extends('layouts.app')

@section('title', 'MidnightBloom - My Orders')

@section('content')
    <div class="min-h-screen bg-slate-50 py-10">
        <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- HEADER --}}
            <div class="mb-10">
                <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-800 tracking-tight">My Orders</h2>
                <p class="text-slate-500 mt-2">Track and view all your past purchases.</p>
            </div>

            @forelse ($orders as $order)
                <a href="{{ route('orders.show', $order) }}"
                    class="block bg-white border border-slate-200 rounded-2xl p-6 mb-4 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200 group">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                        {{-- LEFT: Order Info --}}
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-primary/10 rounded-xl flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-primary" style="font-variation-settings:'FILL' 1">receipt_long</span>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 font-semibold uppercase tracking-wide mb-1">Order #{{ $order->id }}</p>
                                <p class="text-sm text-slate-500">
                                    <span class="material-symbols-outlined text-xs align-middle mr-1">calendar_today</span>
                                    {{ $order->created_at->format('d M Y') }}
                                </p>
                                <p class="text-sm text-slate-500 mt-1">
                                    <span class="material-symbols-outlined text-xs align-middle mr-1">location_on</span>
                                    {{ $order->city }}, {{ $order->postal_code }}
                                </p>
                            </div>
                        </div>

                        {{-- RIGHT: Status & Total --}}
                        <div class="flex flex-row sm:flex-col items-center sm:items-end gap-4 sm:gap-2">
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
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide {{ $colorClass }}">
                                {{ ucfirst($order->status) }}
                            </span>
                            <p class="text-lg font-extrabold text-slate-800">
                                ${{ number_format($order->total_price, 2) }}
                            </p>
                        </div>
                    </div>

                    {{-- Arrow Hint --}}
                    <div class="flex items-center justify-end mt-4 text-slate-300 group-hover:text-primary transition-colors">
                        <span class="text-xs font-semibold mr-1">View Details</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </div>
                </a>
            @empty
                <div class="text-center py-24 bg-white border border-slate-200 rounded-2xl shadow-sm">
                    <span class="material-symbols-outlined text-6xl text-slate-300 block mb-4">receipt_long</span>
                    <p class="text-slate-500 font-semibold text-lg">No orders yet</p>
                    <p class="text-slate-400 text-sm mt-1 mb-6">Looks like you haven't placed any orders.</p>
                    <a href="{{ route('products.index') }}"
                        class="inline-flex items-center gap-2 bg-emerald-400 text-white font-bold px-6 py-3 rounded-xl hover:bg-emerald-500 transition-colors">
                        <span class="material-symbols-outlined">storefront</span>
                        Start Shopping
                    </a>
                </div>
            @endforelse

            {{-- PAGINATION --}}
            @if ($orders->hasPages())
                <div class="mt-8">
                    {{ $orders->links() }}
                </div>
            @endif

        </main>
    </div>
@endsection
