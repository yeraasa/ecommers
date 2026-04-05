@extends('layouts.admin')

@section('title', 'Manage Orders')
@section('content')

    <div class="flex h-screen overflow-hidden">
        <div class="flex-1 overflow-y-auto p-8">
            <!-- Action Bar -->
            <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
                <div class="flex gap-3">
                    <button
                        class="flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-xl font-semibold hover:bg-primary/90 transition-colors">
                        <span class="material-symbols-outlined text-sm">update</span>
                        <span> Update Orders</span>
                    </button>
                </div>

            </div>
            <!-- Table Section -->
            <section class="p-8 pt-4">
                <div
                    class="bg-white dark:bg-black/10 rounded-2xl border border-slate-200 dark:border-primary/5 overflow-hidden shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr
                                    class="bg-slate-50 dark:bg-primary/5 text-slate-600 dark:text-slate-400 uppercase text-[11px] font-bold tracking-widest border-b border-slate-200 dark:border-primary/10">
                                    <th class="px-6 py-4">ID Orders</th>
                                    <th class="px-6 py-4">Customer</th>
                                    <th class="px-6 py-4">Date</th>
                                    <th class="px-6 py-4">Amount</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-primary/5">
                                @forelse($orders as $order)
                                    <tr class="hover:bg-slate-50 dark:hover:bg-primary/5 transition-colors">
                                        <td class="px-6 py-5 font-bold text-primary">
                                            #MB-{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}</td>
                                        <td class="px-6 py-5">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-8 h-8 rounded-full bg-slate-200 dark:bg-primary/20 flex items-center justify-center text-xs font-bold text-primary">
                                                    {{ substr($order->user->name ?? '?', 0, 2) }}
                                                </div>
                                                <span class="font-medium">{{ $order->user->name ?? 'Unknown User' }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5 text-slate-500">{{ $order->created_at->format('Y-m-d') }}</td>
                                        <td class="px-6 py-5 font-semibold">$
                                            {{ number_format($order->total_price, 2) }}</td>
                                        <td class="px-6 py-5">
                                            <form action="{{ route('manage-orders.updateStatus', $order->id) }}" method="POST"
                                                class="flex items-center gap-2">
                                                @csrf
                                                <select name="status" onchange="this.form.submit()" class="text-xs font-bold rounded-full px-3 py-1 border-gray-300 focus:border-primary focus:ring-primary
                                                        @if($order->status == 'pending') bg-amber-100 text-amber-700
                                                        @elseif($order->status == 'completed')
                                                        @elseif($order->status == 'shipped')
                                                        @elseif($order->status == 'delivered')
                                                        @else @endif
                                                    ">
                                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                                        Pending</option>
                                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>
                                                        Shipped</option>
                                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                    <option value="failed" {{ $order->status == 'failed' ? 'selected' : '' }}>
                                                        Failed</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td class="px-6 py-5 text-right">
                                            <button class="text-primary hover:underline text-sm font-bold">Lihat
                                                Detail</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-5 text-center text-slate-500">No orders found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Pagination footer -->
                <div class="mt-6 flex items-center justify-between">
                    <p class="text-xs text-slate-500 font-medium tracking-wide">show 1-4 from 42 orders</p>
                    <div class="flex gap-2">
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-lg border border-slate-200 dark:border-primary/10 hover:bg-white dark:hover:bg-primary/5 transition-colors">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary text-white font-bold">1</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-lg border border-slate-200 dark:border-primary/10 hover:bg-white dark:hover:bg-primary/5 transition-colors">2</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-lg border border-slate-200 dark:border-primary/10 hover:bg-white dark:hover:bg-primary/5 transition-colors">3</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-lg border border-slate-200 dark:border-primary/10 hover:bg-white dark:hover:bg-primary/5 transition-colors">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>
                </div>
            </section>
            </main>
        </div>
        </tbody>

        </html>
@endsection
