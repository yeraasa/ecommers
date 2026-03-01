<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Midnight Bloom', 'cart')</title>

    {{-- Material Symbols --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "oklch(76.5% 0.177 163.223)",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101922",
                        "border-light": "#e5e7eb",
                        "border-dark": "#2d3748",
                    },
                    fontFamily: {
                        display: ["Libre Baskerville", "serif"],
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

    <style>
        body {
            font-family: "Libre Baskerville", serif;
        }

        .thin-border {
            border-width: 0.5px;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-background-light max-h-screen dark:bg-background-dark font-display">
    <div class="flex h-screen overflow-hidden">
        {{-- Sidebar --}}
        <aside
            class="w-16 flex flex-col items-center py-6 bg-white dark:bg-background-dark border-r border-border-light dark:border-border-dark z-20">
            <div class="mb-10 text-emerald-400">
                <span class="material-symbols-outlined text-3xl font-bold">local_florist
                </span>
            </div>

            <nav class="flex flex-col gap-8">
                <a class="text-primary flex flex-col items-center" href="{{ route('products.index') }}">
                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">house</span>
                </a>
                <a class="text-slate-400 hover:text-primary" href="{{ route('category.index') }}"><span
                        class="material-symbols-outlined">search</span></a>
                <a class="text-slate-400 hover:text-primary" href="{{ route('cart.index') }}"><span
                        class="material-symbols-outlined">shopping_cart</span></a>
                <a class="text-slate-400 hover:text-primary" href="#"><span
                        class="material-symbols-outlined">person</span></a>
            </nav>

            <div class="mt-auto">
                <span class="material-symbols-outlined text-slate-400">settings</span>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto">
            {{-- Header --}}
            <header
                class="flex justify-between px-6 py-4 bg-white dark:bg-background-dark/50 sticky top-0 text-teal-500 border-b border-border-light dark:border-border-dark">
                <h1 class="font-bold text uppercase ">Midnight Bloom</h1>
                <span class="material-symbols-outlined ">notifications</span>
            </header>


            {{-- Content --}}
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>

</html>
