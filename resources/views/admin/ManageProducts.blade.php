@extends('layouts.admin')

@section('title', 'Manage Products')

@section('content')
    <main class="flex-1 flex flex-col min-w-0">
        <div class="flex-1 overflow-y-auto p-4 lg:p-8">

            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6 lg:mb-8">
                <h1 class="text-xl lg:text-2xl font-bold text-slate-800 dark:text-white">Daftar Produk</h1>
                <div class="flex w-full sm:w-auto gap-3">
                    <a href="{{ route('manage-products.create') }}"
                        class="flex items-center justify-center gap-2 w-full sm:w-auto px-4 py-2.5 bg-primary text-white rounded-xl font-semibold hover:bg-primary/90 transition-all active:scale-95 shadow-sm shadow-primary/20">
                        <span class="material-symbols-outlined text-lg">add</span>
                        <span class="text-sm">Tambah Produk</span>
                    </a>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[800px] lg:min-w-0">
                        <thead>
                            <tr class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-800">
                                <th class="px-6 py-4 text-xs font-bold uppercase text-slate-500 tracking-wider">Produk</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase text-slate-500 tracking-wider">Kategori</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase text-slate-500 tracking-wider">Stok</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase text-slate-500 tracking-wider">Harga</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase text-slate-500 tracking-wider text-center">Status</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase text-slate-500 tracking-wider text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                            @foreach($products as $product)
                                <tr class="hover:bg-slate-50/80 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-4">
                                            <div class="flex-shrink-0 w-12 h-12 rounded-xl overflow-hidden bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
                                                @if($product->image)
                                                    <img class="w-full h-full object-cover" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" />
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center text-slate-400">
                                                        <span class="material-symbols-outlined">image</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="min-w-0">
                                                <p class="font-bold text-sm text-slate-800 dark:text-slate-200 truncate">{{ $product->name }}</p>
                                                <p class="text-[10px] font-medium text-slate-400 dark:text-slate-500 uppercase tracking-tighter">ID: #{{ $product->id }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm text-slate-600 dark:text-slate-400">{{ $product->category }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-semibold text-slate-700 dark:text-slate-300">{{ $product->stock_quantity }}</span>
                                            <span class="text-[10px] text-slate-400 uppercase font-bold">Unit</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-bold text-slate-800 dark:text-slate-200">$ {{ number_format($product->price, 2) }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if($product->status === 'active')
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[10px] font-bold uppercase bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400 border border-emerald-200/50 dark:border-emerald-800/50">
                                                Tersedia
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[10px] font-bold uppercase bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400 border border-rose-200/50 dark:border-rose-800/50">
                                                Kosong
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-end items-center gap-1">
                                            <a href="{{ route('manage-products.edit', $product->id) }}"
                                                class="p-2 text-slate-400 hover:text-primary hover:bg-primary/10 rounded-xl transition-all"
                                                title="Edit Produk">
                                                <span class="material-symbols-outlined text-xl font-light">edit</span>
                                            </a>
                                            <form action="{{ route('manage-products.destroy', $product->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');"
                                                    class="p-2 text-slate-400 hover:text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-900/20 rounded-xl transition-all"
                                                    title="Hapus Produk">
                                                    <span class="material-symbols-outlined text-xl font-light">delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if(method_exists($products, 'links'))
                    <div class="px-6 py-4 bg-slate-50/50 dark:bg-slate-800/30 flex flex-col md:flex-row items-center justify-between gap-4 border-t border-slate-200 dark:border-slate-800">
                        <p class="text-xs font-medium text-slate-500 dark:text-slate-400 order-2 md:order-1">
                            Menampilkan <span class="text-slate-800 dark:text-slate-200">{{ $products->firstItem() ?? 0 }}</span> - <span class="text-slate-800 dark:text-slate-200">{{ $products->lastItem() ?? 0 }}</span> dari {{ $products->total() }} produk
                        </p>
                        <div class="order-1 md:order-2">
                            {{ $products->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
