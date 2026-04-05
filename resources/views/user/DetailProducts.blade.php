@extends('layouts.app')

@section('title', 'MidnightBloom - Checkout')

@section('content')

    <body class="bg-background text-on-surface font-body selection:bg-primary selection:text-on-primary">
        <main class="pt-10 min-h-screen">
            <!-- Product Hero Section -->
            <section class="max-w-7xl mx-auto px-8 grid grid-cols-1 md:grid-cols-12 gap-12 pb-24">
                <!-- Left Side: Product Image -->
                <div class="md:col-span-7 space-y-4">
                    <div class="relative aspect-[4/5] rounded-xl overflow-hidden bg-surface-container-low group">
                        <img alt="Midnight Rose Bouquet"
                            class="w-200 h-150 object-cover transform transition-transform duration-700 group-hover:scale-105"
                            data-alt="Stunning close-up of dark velvet roses with deep teal highlights and iridescent petals arranged in a luxury midnight garden setting"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBhMTwWbAYpIguvGfzlI5XITHuVOPVJx69-ABkRSws-oQAztl7LeEJzz1ERRajBAbmJzPI10Jt1GlHsddFSXTmB8sV7A06xtymgQYLB7WJltfE-e9R7756Kmhz9lOOIC7TEYmbllPw8ML0gHD7KBLvCr5ufv5L3HCufgF_U2Hm27oP2u-kgkik-DXNIBm2U6KcnnCKvuHw5V6e_0xXxRLAJbViOFc0OFdRjslywC6SdCAR_DGqogVL3jM5QIjCGIywcOizE6iMEE2sX" />
                        <div class="absolute inset-0 bg-gradient-to-t from-background/60 to-transparent"></div>
                    </div>

                </div>
                <!-- Right Side: Product Details -->
                <div class="md:col-span-5 flex flex-col pt-4">
                    <header class="mb-8">
                        <h1 class="text-3xl font-extrabold tracking-tight text-on-background mb-2">Midnight Rose Bouquet
                        </h1>
                        <div class="flex items-center gap-4 mb-4">
                            <span class="text-2xl font-bold text-primary">Rp 450.000</span>
                            <div class="h-4 w-px bg-primary/20"></div>
                        </div>
                    </header>
                    <!-- Tabs-like Bento Section -->
                    <div class="space-y-6 flex-grow">
                        <div class="bg-primary/5 rounded-xl p-6 border border-slate-200">
                            <h3 class="text-xs font-black uppercase tracking-widest text-primary mb-3">The Botanical Origin
                            </h3>
                            <p class="text-sm leading-relaxed text-on-surface-variant">
                                Sourced from the hidden valley of Nocturne, these rare roses are harvested only under the
                                full moon to preserve their iridescent deep-teal shimmer. Each petal carries the essence of
                                midnight dew, treated with our signature botanical alchemy to ensure eternal freshness and a
                                captivating, mysterious fragrance that lingers in the darkness.
                            </p>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div
                                class="bg-surface-container border-slate border-primary/10 bg-emerald-400 rounded-xl p-4 flex flex-col items-center text-center">
                                <span class="material-symbols-outlined text-primary mb-2" data-icon="eco">eco</span>
                                <span
                                    class="text-[10px] font-bold uppercase tracking-widest text-on-surface">Sustainable</span>
                            </div>
                            <div
                                class="bg-surface-container border-slate border-primary/10 bg-emerald-400 rounded-xl p-4 flex flex-col items-center text-center">
                                <span class="material-symbols-outlined text-primary mb-2"
                                    data-icon="auto_awesome">auto_awesome</span>
                                <span
                                    class="text-[10px] font-bold uppercase tracking-widest text-on-surface">Hand-Treated</span>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <h3 class="text-xs font-black uppercase tracking-widest text-primary">Care Instructions</h3>
                            <ul class="space-y-3">
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-primary text-lg"
                                        data-icon="dark_mode">dark_mode</span>
                                    <span class="text-sm text-on-surface-variant">Keep in low to indirect light to maintain
                                        deep pigment.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-primary text-lg"
                                        data-icon="opacity">opacity</span>
                                    <span class="text-sm text-on-surface-variant">Mist with distilled water every 3 nights
                                        at midnight.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-primary text-lg"
                                        data-icon="thermostat">thermostat</span>
                                    <span class="text-sm text-on-surface-variant">Optimal temperature: 18°C - 22°C.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Action Button -->
                    <div class="mt-12 flex flex-col ">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center bg-surface-container border border-slate-300 rounded-lg p-1">
                                <button class="p-2 text-primary hover:bg-primary/10 rounded-md transition-colors">
                                    <span class="material-symbols-outlined" data-icon="remove">remove</span>
                                </button>
                                <span class="w-12 text-center font-bold">1</span>
                                <button class="p-2 text-primary hover:bg-primary/10 rounded-md transition-colors">
                                    <span class="material-symbols-outlined" data-icon="add">add</span>
                                </button>
                            </div>
                            <div class="flex items-center bg-surface-container border border-slate-200 rounded-lg p-1">
                                <button class="p-2 text-primary py-3 hover:bg-emerald-400 rounded-md transition-colors">
                                    <span class="material-symbols-outlined" data-icon="shopping_bag">shopping_bag</span>
                                    shop now
                                </button>
                            </div>

                            <div class="flex items-center bg-surface-container border border-slate-200 rounded-lg p-1">
                                <button class="p-2 text-primary py-3 hover:bg-emerald-400 rounded-md transition-colors">
                                    <span class="material-symbols-outlined"> add_shopping_cart </span>
                                    add to cart
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>

@endsection
