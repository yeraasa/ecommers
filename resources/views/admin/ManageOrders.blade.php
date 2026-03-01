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
                                <!-- Order Row 1 -->
                                <tr class="hover:bg-slate-50 dark:hover:bg-primary/5 transition-colors">
                                    <td class="px-6 py-5 font-bold text-primary">#MB-001</td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-slate-200 dark:bg-primary/20 flex items-center justify-center text-xs font-bold text-primary">
                                                AS</div>
                                            <span class="font-medium">Alice Smith</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 text-slate-500">2023-10-24</td>
                                    <td class="px-6 py-5 font-semibold">Rp 250.000</td>
                                    <td class="px-6 py-5">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-700 dark:bg-amber-500/10 dark:text-amber-500">
                                            <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                            Pending
                                        </span>
                                    </td>
                                    <td class="px-6 py-5 text-right">
                                        <button class="text-primary hover:underline text-sm font-bold">Lihat
                                            Detail</button>
                                    </td>
                                </tr>
                                <!-- Order Row 2 -->
                                <tr class="hover:bg-slate-50 dark:hover:bg-primary/5 transition-colors">
                                    <td class="px-6 py-5 font-bold text-primary">#MB-002</td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-slate-200 dark:bg-primary/20 flex items-center justify-center text-xs font-bold text-primary">
                                                BJ</div>
                                            <span class="font-medium">Bob Johnson</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 text-slate-500">2023-10-23</td>
                                    <td class="px-6 py-5 font-semibold">Rp 450.000</td>
                                    <td class="px-6 py-5">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400">
                                            <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                            Dikirim
                                        </span>
                                    </td>
                                    <td class="px-6 py-5 text-right">
                                        <button class="text-primary hover:underline text-sm font-bold">Lihat
                                            Detail</button>
                                    </td>
                                </tr>
                                <!-- Order Row 3 -->
                                <tr class="hover:bg-slate-50 dark:hover:bg-primary/5 transition-colors">
                                    <td class="px-6 py-5 font-bold text-primary">#MB-003</td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-slate-200 dark:bg-primary/20 flex items-center justify-center text-xs font-bold text-primary">
                                                CB</div>
                                            <span class="font-medium">Charlie Brown</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 text-slate-500">2023-10-22</td>
                                    <td class="px-6 py-5 font-semibold">Rp 120.000</td>
                                    <td class="px-6 py-5">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400">
                                            <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                            Selesai
                                        </span>
                                    </td>
                                    <td class="px-6 py-5 text-right">
                                        <button class="text-primary hover:underline text-sm font-bold">Lihat
                                            Detail</button>
                                    </td>
                                </tr>
                                <!-- Order Row 4 -->
                                <tr class="hover:bg-slate-50 dark:hover:bg-primary/5 transition-colors">
                                    <td class="px-6 py-5 font-bold text-primary">#MB-004</td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-slate-200 dark:bg-primary/20 flex items-center justify-center text-xs font-bold text-primary">
                                                DP</div>
                                            <span class="font-medium">Diana Prince</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 text-slate-500">2023-10-21</td>
                                    <td class="px-6 py-5 font-semibold">Rp 300.000</td>
                                    <td class="px-6 py-5">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-rose-100 text-rose-700 dark:bg-rose-500/10 dark:text-rose-400">
                                            <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                            Batal
                                        </span>
                                    </td>
                                    <td class="px-6 py-5 text-right">
                                        <button class="text-primary hover:underline text-sm font-bold">Lihat
                                            Detail</button>
                                    </td>
                                </tr>
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
