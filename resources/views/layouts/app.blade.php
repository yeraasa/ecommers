<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Midnight Bloom')</title>

    {{-- Material Symbols --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "oklch(76.5% 0.177 163.223)",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101922",
                        "border-light": "#e2e8f0 ",
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

    @vite('resources/css/app.css')
    @stack('styles')
</head>

<body class="bg-background-light max-h-screen dark:bg-background-dark font-display">
    <div class="flex h-screen overflow-hidden">
        {{-- Sidebar --}}
        <aside
            class="w-16 flex flex-col items-center py-6 bg-white dark:bg-background-dark border-r border-slate-200 z-20">
            <div class="mb-10 text-emerald-400">
                <span class="material-symbols-outlined text-3xl font-bold">local_florist
                </span>
            </div>

            <nav class="flex flex-col gap-8">
                <a class="text-slate-400 hover:text-emerald-400" href="{{ route('products.index') }}">
                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">house</span>
                </a>
                <a class="text-slate-400 hover:text-emerald-400" href="{{ route('category.index') }}"><span
                        class="material-symbols-outlined">search</span></a>
                <a class="text-slate-400 hover:text-emerald-400" href="{{ route('cart.index') }}"><span
                        class="material-symbols-outlined">shopping_cart</span></a>
                <a class="text-slate-400 hover:text-emerald-400" href="#"><span
                        class="material-symbols-outlined">person</span></a>
            </nav>

            <div class="mt-auto flex flex-col items-center gap-6 pb-4">
                <form method="POST" action="{{ route('auth.logout') }}">
                    @csrf
                    <button type="submit" class="text-rose-400 hover:text-rose-600 flex items-center" title="Logout">
                        <span class="material-symbols-outlined">logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto">
            {{-- Header --}}
            <header
                class="flex justify-between px-6 z-50 py-4 bg-white dark:bg-background-dark/50 sticky top-0 text-emerald-400 border-b border-slate-200">
                <h1 class="font-bold text uppercase ">Midnight Bloom</h1>
            </header>


            {{-- Content --}}
            @if (session('success'))
                <div class="max-w-7xl mx-auto px-6 mt-4">
                    <div class="bg-emerald-100 border border-slate-200 text-emerald-700 px-4 py-3 rounded relative"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="max-w-7xl mx-auto px-6 mt-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="max-w-7xl mx-auto px-6 mt-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>

</html>
