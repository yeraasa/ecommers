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

<body
    class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 min-h-screen overflow-x-hidden">

    <div class="flex min-h-screen relative">

        {{-- Overlay untuk Mobile (Muncul saat sidebar terbuka) --}}
        <div id="sidebarOverlay" class="fixed inset-0 bg-slate-900/50 z-20 hidden lg:hidden transition-opacity"></div>

        {{-- Sidebar --}}
        <aside id="adminSidebar"
            class="fixed inset-y-0 left-0 z-30 w-64 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 transform -translate-x-full transition-transform duration-300 ease-in-out lg:relative lg:translate-x-0 flex flex-col">

            <div class="p-6 flex items-center justify-between lg:justify-start gap-3">
                <div class="flex items-center gap-3">
                    <div class="bg-primary/20 p-2 rounded-xl">
                        <span class="material-symbols-outlined text-primary text-3xl">filter_vintage</span>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold leading-tight dark:text-white text-nowrap">Midnight Bloom</h1>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Admin Dashboard</p>
                    </div>
                </div>
                {{-- Tombol Close di Mobile --}}
                <button onclick="toggleSidebar()" class="lg:hidden text-slate-500">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">
                <a class="flex items-center gap-3 px-3 py-2 hover:bg-primary/10 dark:hover:bg-slate-800 text-primary rounded-xl"
                    href="{{ route('manage-products.index') }}">
                    <span class="material-symbols-outlined">inventory_2</span>
                    <span class="text-sm font-medium">Manage Product</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 hover:bg-primary/10 dark:hover:bg-slate-800 rounded-xl text-primary"
                    href="{{ route('manage-orders.index') }}">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    <span class="text-sm font-medium">Manage Orders</span>
                </a>

                <div class="pt-4 pb-2 border-t border-slate-200 dark:border-slate-800 mt-4">
                    <form method="POST" action="{{ route('auth.logout') }}" class="mt-1">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-3 px-3 py-2 text-rose-600 dark:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-900/20 rounded-xl transition-colors">
                            <span class="material-symbols-outlined">logout</span>
                            <span class="text-sm font-medium">Logout</span>
                        </button>
                    </form>
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
        <main class="flex-1 flex flex-col min-w-0 h-screen overflow-hidden">

            {{-- Header --}}
            <header
                class="h-16 flex-shrink-0 flex items-center justify-between px-4 lg:px-8 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-4">
                    {{-- Hamburger Button --}}
                    <button onclick="toggleSidebar()"
                        class="lg:hidden p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <h2 class="text-lg lg:text-xl font-bold truncate">@yield('title')</h2>
                </div>

                <div class="flex items-center gap-2 lg:gap-6">
                    {{-- Search - Hidden on very small screens --}}
                    <div class="relative hidden sm:block max-w-xs">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                        <input
                            class="w-full pl-9 pr-4 py-1.5 bg-slate-100 dark:bg-slate-800 border-none rounded-xl text-sm focus:ring-2 focus:ring-primary"
                            placeholder="Cari..." type="text" />
                    </div>
                    {{-- Search Icon for Mobile --}}
                    <button class="sm:hidden p-2 text-slate-500">
                        <span class="material-symbols-outlined">search</span>
                    </button>
                </div>
            </header>

            {{-- Dynamic Content --}}
            <div class="flex-1 overflow-auto p-4 lg:p-8">
                @yield('content')
            </div>

        </main>

    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');

            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        // Tutup sidebar jika overlay diklik
        document.getElementById('sidebarOverlay').addEventListener('click', toggleSidebar);
    </script>

    @stack('scripts')
</body>

</html>
