@extends('layouts.admin')

@section('title', 'Add Products')

@section('content')
    <form action="{{ route('manage-products.store') }}" method="POST">
        @csrf

        <div class="px-8 pb-12 max-w-5xl">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- LEFT -->
                <div class="lg:col-span-1 space-y-6">

                    <!-- IMAGE -->
                    <section>
                        <h3 class="text-sm font-bold text-primary mb-4 flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">image</span>
                            product images
                        </h3>

                        <div
                            class="flex flex-col items-center justify-center gap-4
                            rounded-xl border-2 border-dashed border-primary/20
                            bg-primary/5 px-6 py-12">

                            <div class="size-16 rounded-full bg-primary/20 flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined text-[32px]">cloud_upload</span>
                            </div>

                            <p class="text-slate-500 text-[11px]">JPG, PNG</p>

                            <!-- INPUT FILE ASLI -->
                            <input type="file" name="image" accept="image/png,image/jpeg"
                                class="cursor-pointer text-xs
                               file:px-4 file:py-2
                               file:rounded-lg file:border-0
                               file:bg-primary file:text-white">
                        </div>
                    </section>

                    <!-- STATUS -->
                    <section class="rounded-xl p-6">
                        <h3 class="text-sm font-bold text-primary mb-4">status</h3>

                        <label class="flex items-center gap-3">
                            <input type="radio" name="status" value="active" checked>
                            <span class="text-sm">available</span>
                        </label>

                        <label class="flex items-center gap-3 mt-2">
                            <input type="radio" name="status" value="inactive">
                            <span class="text-sm">unavailable</span>
                        </label>
                    </section>
                </div>

                <!-- RIGHT -->
                <div class="lg:col-span-2 space-y-6">

                    <section class="border border-primary rounded-xl p-8 space-y-6">

                        <div>
                            <label class="text-xs font-bold uppercase">product name</label>
                            <input type="text" name="name" class="w-full px-4 py-3 border rounded">
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="text-xs font-bold uppercase">category</label>
                                <select name="category" class="w-full px-4 py-3 border rounded">
                                    <option value="">select category</option>
                                    <option value="flowers">flowers</option>
                                    <option value="tools">tools</option>
                                    <option value="seeds">seeds</option>
                                </select>
                            </div>

                            <div>
                                <label class="text-xs font-bold uppercase">stock</label>
                                <input type="number" name="stock_quantity" class="w-full px-4 py-3 border rounded">
                            </div>
                        </div>

                        <div>
                            <label class="text-xs font-bold uppercase">price</label>
                            <input type="number" name="price" class="w-full px-4 py-3 border rounded">
                        </div>

                        <div>
                            <label class="text-xs font-bold uppercase">description</label>
                            <textarea name="description" rows="5" class="w-full px-4 py-3 border rounded"></textarea>
                        </div>

                    </section>

                    <!-- BUTTONS -->
                    <section class="border border-primary rounded-xl p-8 grid grid-cols-2 gap-6">
                        <button type="submit" class="px-4 py-3 bg-primary text-white rounded">
                            save
                        </button>

                        <a href="{{ route('manage-products.index') }}"
                            class="px-4 py-3 bg-gray-500 text-white rounded text-center">
                            back
                        </a>
                    </section>

                </div>
            </div>
        </div>
    </form>
@endsection
