@extends('layouts.admin')

@section('title', 'Manage Orders')

@section('content')
    <main class="flex-1 flex flex-col min-w-0">
        <div class="flex-1 overflow-y-auto p-4 lg:p-8">

            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
                <h1 class="text-xl lg:text-2xl font-bold text-slate-800 dark:text-white">Pesanan Masuk</h1>
                <div class="flex w-full sm:w-auto gap-3">
                    <button
                        class="flex items-center justify-center gap-2 w-full sm:w-auto px-4 py-2.5 bg-primary text-white rounded-xl font-semibold hover:bg-primary/90 transition-all active:scale-95 shadow-sm shadow-primary/20">
                        <span class="material-symbols-outlined text-sm">update</span>
                        <span>Update Orders</span>
                    </button>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[700px]">
                        <thead>
                            <tr class="bg-slate-50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-400 uppercase text-[11px] font-bold tracking-widest border-b border-slate-200 dark:border-slate-800">
                                <th class="px-6 py-4">ID Orders</th>
                                <th class="px-6 py-4">Customer</th>
                                <th class="px-6 py-4">Date</th>
                                <th class="px-6 py-4">Amount</th>
                                <th class="px-6 py-4 text-center">Status</th>
                                <th class="px-6 py-4 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            @forelse($orders as $order)
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-5 font-bold text-primary italic">
                                        #MB-{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-3">
                                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-xs font-bold text-primary">
                                                {{ substr($order->user->name ?? '?', 0, 2) }}
                                            </div>
                                            <span class="font-medium text-sm truncate max-w-[150px]">{{ $order->user->name ?? 'Unknown User' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 text-sm text-slate-500">
                                        {{ $order->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-5 font-bold text-sm">
                                        $ {{ number_format($order->total_price, 2) }}
                                    </td>
                                    <td class="px-6 py-5">
                                        <form action="{{ route('manage-orders.updateStatus', $order->id) }}" method="POST">
                                            @csrf
                                            <select name="status" onchange="this.form.submit()"
                                                class="text-[10px] uppercase tracking-wider font-bold rounded-lg px-2 py-1 border-none focus:ring-2 focus:ring-primary w-full
                                                @if($order->status == 'pending') bg-amber-100 text-amber-700
                                                @elseif($order->status == 'completed') bg-emerald-100 text-emerald-700
                                                @elseif($order->status == 'shipped') bg-blue-100 text-blue-700
                                                @elseif($order->status == 'delivered') bg-purple-100 text-purple-700
                                                @else bg-rose-100 text-rose-700 @endif">
                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                <option value="failed" {{ $order->status == 'failed' ? 'selected' : '' }}>Failed</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="px-6 py-5 text-right">
                                        <button class="text-primary hover:text-primary/70 text-xs font-bold transition-colors">
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-10 text-center text-slate-500">No orders found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-xs text-slate-500 font-medium tracking-wide order-2 md:order-1">
                    Showing 1-4 from 42 orders
                </p>
                <div class="flex gap-1 order-1 md:order-2">
                    <button class="w-9 h-9 flex items-center justify-center rounded-xl border border-slate-200 dark:border-slate-800 hover:bg-white transition-colors">
                        <span class="material-symbols-outlined text-sm">chevron_left</span>
                    </button>
                    <button class="w-9 h-9 flex items-center justify-center rounded-xl bg-primary text-white font-bold text-sm shadow-sm shadow-primary/20">1</button>
                    <button class="w-9 h-9 flex items-center justify-center rounded-xl border border-slate-200 dark:border-slate-800 hover:bg-white transition-colors text-sm">2</button>
                    <button class="w-9 h-9 flex items-center justify-center rounded-xl border border-slate-200 dark:border-slate-800 hover:bg-white transition-colors">
                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
