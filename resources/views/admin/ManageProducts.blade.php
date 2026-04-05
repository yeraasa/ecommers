@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')

    <main class="flex-1 flex flex-col overflow-hidden">
        <!-- Dashboard Content -->
        <div class="flex-1 overflow-y-auto p-8">
            <!-- Action Bar -->
            <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
                <div class="flex gap-3">
                    <a href="{{ route('manage-products.create') }}"
                        class="flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-xl font-semibold hover:bg-primary/90 transition-colors">
                        <span class="material-symbols-outlined text-sm">add</span>
                        <span>Tambah Produk</span>
                    </a>
                    <button
                        class="flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl font-medium hover:bg-slate-50 transition-colors">
                        <span class="material-symbols-outlined text-sm">filter_list</span>
                        <span>Filter</span>
                    </button>
                </div>
                <div class="flex gap-2">
                    <button
                        class="p-2 rounded-lg bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400">
                        <span class="material-symbols-outlined">grid_view</span>
                    </button>
                    <button
                        class="p-2 rounded-lg bg-slate-100 dark:bg-slate-700 border border-slate-300 dark:border-slate-600 text-primary">
                        <span class="material-symbols-outlined">list</span>
                    </button>
                </div>
            </div>
            <!-- Table -->
            <div
                class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-800">
                            <th class="px-6 py-4 text-xs font-semibold uppercase text-slate-500 tracking-wider">
                                Produk</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase text-slate-500 tracking-wider">
                                Kategori</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase text-slate-500 tracking-wider">Stok
                            </th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase text-slate-500 tracking-wider">
                                Harga</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase text-slate-500 tracking-wider">
                                Status</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase text-slate-500 tracking-wider text-right">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                        @foreach($products as $product)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-lg overflow-hidden bg-slate-100">
                                            @if($product->image)
                                                <img class="w-full h-full object-cover" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" />
                                            @else
                                                <div class="w-full h-full bg-gray-200"></div>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-semibold text-sm">{{ $product->name }}</p>
                                            <p class="text-xs text-slate-500">ID: {{ $product->id }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm">{{ $product->category }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="font-medium">{{ $product->stock_quantity }}</span> <span class="text-slate-400">units</span>
                                </td>
                                <td class="px-6 py-4 text-sm font-semibold">$ {{ number_format($product->price, 2) }}</td>
                                <td class="px-6 py-4">
                                    @if($product->status === 'active')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">Tersedia</span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-rose-100 text-rose-800 dark:bg-rose-900/30 dark:text-rose-400">Tidak tersedia</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('manage-products.edit', $product->id) }}" class="p-1.5 text-slate-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-xl">edit</span>
                                        </a>
                                        <form action="{{ route('manage-products.destroy', $product->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Delete this product?');" class="p-1.5 text-slate-400 hover:text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-900/20 rounded-lg transition-colors">
                                                <span class="material-symbols-outlined text-xl">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(method_exists($products, 'links'))
                    <div class="px-6 py-4 bg-slate-50 dark:bg-slate-800/50 flex items-center justify-between border-t border-slate-200 dark:border-slate-800">
                        <p class="text-sm text-slate-500">Menampilkan {{ $products->firstItem() ?? 0 }} sampai {{ $products->lastItem() ?? 0 }} dari {{ $products->total() ?? $products->count() }} produk</p>
                        <div>
                            {{ $products->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection