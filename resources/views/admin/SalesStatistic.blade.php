@extends('layouts.admin')

@section('title', 'Sales Statistic')

@section('content')
    <!-- Content Scroll Area -->
    <div class="flex-1 overflow-y-auto p-8 space-y-8">
        <!-- KPI Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">

            <div class="bg-white dark:bg-slate-900 p-8 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-md">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-base font-medium">
                            Total Pendapatan
                        </p>
                        <h3 class="text-4xl font-bold mt-2">
                            Rp 128.5M
                        </h3>
                    </div>
                    <div class="p-3 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-xl">
                        <span class="material-symbols-outlined text-3xl">payments</span>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 p-8 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-md">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-base font-medium">
                            Total Pesanan
                        </p>
                        <h3 class="text-4xl font-bold mt-2">
                            1,240
                        </h3>
                    </div>
                    <div class="p-3 bg-primary/10 text-primary rounded-xl">
                        <span class="material-symbols-outlined text-3xl">shopping_basket</span>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 p-8 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-md">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-base font-medium">
                            Pelanggan Baru
                        </p>
                        <h3 class="text-4xl font-bold mt-2">
                            450
                        </h3>
                    </div>
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-xl">
                        <span class="material-symbols-outlined text-3xl">person_add</span>
                    </div>
                </div>
            </div>

        </div>
        <!-- Main Charts & Lists Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Tren Pendapatan (Large Bar Chart) -->
            <div
                class="lg:col-span-2 bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h4 class="text-lg font-bold">Tren Pendapatan</h4>
                        <p class="text-sm text-slate-500">7 Hari Terakhir</p>
                    </div>
                    <select
                        class="bg-slate-100 dark:bg-slate-800 border-none rounded-lg text-xs font-medium focus:ring-primary py-1.5 pl-3 pr-8">
                        <option>Mingguan</option>
                        <option>Bulanan</option>
                    </select>
                </div>
                <div class="h-64 flex items-end justify-between gap-4 px-2">
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-t-lg relative" style="height: 40%">
                            <div class="absolute inset-0 bg-primary opacity-30 rounded-t-lg"></div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase">Mon</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-t-lg relative" style="height: 90%">
                            <div class="absolute inset-0 bg-primary opacity-60 rounded-t-lg"></div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase">Tue</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-t-lg relative" style="height: 55%">
                            <div class="absolute inset-0 bg-primary opacity-40 rounded-t-lg"></div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase">Wed</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-t-lg relative" style="height: 70%">
                            <div class="absolute inset-0 bg-primary opacity-50 rounded-t-lg"></div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase">Thu</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-t-lg relative" style="height: 65%">
                            <div class="absolute inset-0 bg-primary opacity-45 rounded-t-lg"></div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase">Fri</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-t-lg relative" style="height: 100%">
                            <div class="absolute inset-0 bg-primary rounded-t-lg"></div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase">Sat</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-t-lg relative" style="height: 35%">
                            <div class="absolute inset-0 bg-primary opacity-25 rounded-t-lg"></div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase">Sun</span>
                    </div>
                </div>
            </div>
            <!-- Sumber Pendapatan (Donut Chart representation) -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <h4 class="text-lg font-bold mb-6">Sumber Pendapatan</h4>
                <div class="relative w-48 h-48 mx-auto mb-8">
                    <svg class="w-full h-full transform -rotate-90" viewbox="0 0 36 36">
                        <circle class="text-slate-100 dark:text-slate-800" cx="18" cy="18" fill="transparent"
                            r="16" stroke="currentColor" stroke-width="4"></circle>
                        <circle cx="18" cy="18" fill="transparent" r="16" stroke="#ec5b13"
                            stroke-dasharray="65 100" stroke-linecap="round" stroke-width="4"></circle>
                        <circle cx="18" cy="18" fill="transparent" r="16" stroke="#3b82f6"
                            stroke-dasharray="20 100" stroke-dashoffset="-65" stroke-linecap="round" stroke-width="4">
                        </circle>
                        <circle cx="18" cy="18" fill="transparent" r="16" stroke="#10b981"
                            stroke-dasharray="15 100" stroke-dashoffset="-85" stroke-linecap="round" stroke-width="4">
                        </circle>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center flex-col">
                        <span class="text-xl font-bold">100%</span>
                        <span class="text-[10px] text-slate-400 uppercase font-bold">Total</span>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="size-3 rounded-full bg-primary"></span>
                            <span class="text-sm font-medium">Direct Sales</span>
                        </div>
                        <span class="text-sm font-bold">65%</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="size-3 rounded-full bg-blue-500"></span>
                            <span class="text-sm font-medium">Affiliates</span>
                        </div>
                        <span class="text-sm font-bold">20%</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="size-3 rounded-full bg-emerald-500"></span>
                            <span class="text-sm font-medium">Social Ads</span>
                        </div>
                        <span class="text-sm font-bold">15%</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Produk Terlaris Table -->
        <div
            class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between">
                <h4 class="text-lg font-bold">Produk Terlaris</h4>
                <button class="text-primary text-sm font-bold hover:underline">Lihat Semua</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 dark:bg-slate-800/50">
                        <tr>
                            <th class="px-6 py-4 text-xs font-bold uppercase text-slate-400">product name</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase text-slate-400">category</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase text-slate-400">units sold</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase text-slate-400">Stock</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase text-slate-400">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="size-10 rounded-lg bg-cover bg-center bg-slate-100"
                                        data-alt="Midnight Rose Perfume"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBduhQ2_52s-rFUVXClhJW_T6yPbjlIBtpgLO9Y_dujTVD8AZ7zg3idZJiGDxZi6fj30xlxqMZoShN3dcCNVpLGorvdcrbyn6oeaOmaGh9a0Y_nXzd3pY6reoz7t91vpW2hNPvhYK_7Xw9wPy-iksu9ccz7cDDkeULxb6FbCEwMUWmvfN6It4MDedKqHiOhY6Jq1ZkAMNu992WSQvArkywlRw3wOo51ebgKvjxi6IiW6JRnZ0Hfq4BBvdZlF00h4np1VJVF-ZpWUNvU')">
                                    </div>
                                    <span class="text-sm font-bold">Midnight Rose Perfume</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-500">Fragrance</td>
                            <td class="px-6 py-4 text-sm font-bold">452 unit</td>
                            <td class="px-6 py-4 text-sm font-medium">85</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-full text-[10px] font-bold uppercase">Trending</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </main>
    </div>
    </body>

    </html>
@endsection
