<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'Midnight Bloom - Admin')</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#14b8a6",
                        "background-light": "#f8f6f6",
                        "background-dark": "#0f172a",
                    },
                    fontFamily: {
                        display: ["Public Sans", "sans-serif"]
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },
                },
            },
        }
    </script>

    @stack('styles')
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 min-h-screen">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside
            class="w-64 flex-shrink-0 bg-white  border-primary flex flex-col">
            <div class="p-6 flex items-center gap-3">
                <div class="bg-primary/20 p-2 rounded-xl">
                    <span class="material-symbols-outlined text-primary text-3xl">filter_vintage</span>
                </div>
                <div>
                    <h1 class="text-lg font-bold leading-tight dark:text-white">Midnight Bloom</h1>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Admin Dashboard</p>
                </div>
            </div>
            <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">
                <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-xl transition-colors"
                    href="#">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 bg-primary/10 text-primary rounded-xl"
                    href=" {{ route('manage-products.index') }}">
                    <span class="material-symbols-outlined">inventory_2</span>
                    <span class="text-sm font-medium">Manage Product</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-xl transition-colors"
                    href="{{ route('manage-orders.index') }}">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    <span class="text-sm font-medium">Manage Orders</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-xl transition-colors"
                    href="
                    {{ route('sales-statistic.index') }}">
                    <span class="material-symbols-outlined">bar_chart</span>
                    <span class="text-sm font-medium">Statistic</span>
                </a>
                <div class="pt-4 pb-2 border-t border-slate-200 dark:border-slate-800 mt-4">
                    <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-xl transition-colors"
                        href="#">
                        <span class="material-symbols-outlined">settings</span>
                        <span class="text-sm font-medium">Settings</span>
                    </a>
                </div>
            </nav>
            <div class="p-4 border-t border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-3 p-2 rounded-xl bg-slate-50 dark:bg-slate-800/50">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold truncate">Alex Rivera</p>
                        <p class="text-xs text-slate-500 truncate">Store Manager</p>
                    </div>
                </div>
            </div>
        </aside>
        {{-- Main Content --}}
        <main class="flex-1 flex flex-col">

            {{-- Header --}}
            <header
                class="h-16 flex items-center justify-between px-8 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-4">
                    <h2 class="text-xl font-bold">@yield('title')</h2>
                </div>
                <div class="flex items-center gap-6">
                    <div class="relative max-w-xs">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                        <input
                            class="w-full pl-10 pr-4 py-2 bg-slate-100 dark:bg-slate-800 border-none rounded-xl text-sm focus:ring-2 focus:ring-primary"
                            placeholder="Cari produk..." type="text" />
                    </div>

                </div>
            </header>

            {{-- Dynamic Content --}}
            <div class="flex-1 overflow-auto p-8">
                @yield('content')
            </div>

        </main>

    </div>

    @stack('scripts')
</body>

</html>
