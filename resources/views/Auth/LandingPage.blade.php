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

    @stack('styles')
</head>
<body>
   <!-- Main Content -->
    <main class="flex-grow pt-20">
        <!-- Hero Section -->
        <section class="relative min-h-[85vh] flex flex-col items-center justify-center px-6 overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-1/4 -left-20 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
            <div class="max-w-4xl w-full text-center relative z-10">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-widest mb-8">
                    <span class="material-symbols-outlined text-sm">local_florist</span>
                    <span>New Seasonal Collection Available</span>
                </div>
                <h2 class="text-6xl md:text-8xl font-extrabold tracking-tighter text-slate-900 dark:text-slate-100 mb-6">
                    Midnight <span class="text-primary">Bloom</span>
                </h2>
                <p
                    class="text-lg md:text-xl text-slate-600 dark:text-slate-400 font-medium leading-relaxed max-w-2xl mx-auto mb-12">
                    Start your garden journey and cultivate your own sanctuary of peace with our curated collection of
                    night-blooming flora.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <button
                        class="bg-primary hover:bg-primary/90 text-background-dark px-10 py-5 rounded-xl text-lg font-bold transition-all shadow-xl shadow-primary/20 hover:shadow-primary/40 transform hover:-translate-y-1">
                        <a href="{{ route('auth.signin') }}" class="text-white">Sign In</a>
                    </button>
                    <button
                        class="px-10 py-5 rounded-xl text-lg font-bold border border-slate-200 dark:border-slate-800 hover:bg-slate-50 dark:hover:bg-slate-900 transition-all">
                        <a href="{{ route('auth.signup') }}" class="text-slate-900 dark:text-slate-100">Sign Up</a>
                    </button>
                </div>
            </div>
            <!-- Hero Image Preview -->
            <div class="mt-20 w-full max-w-5xl mx-auto rounded-2xl overflow-hidden shadow-2xl border border-primary/5">
                <img src="{{ asset('assets/images/toko bungaa.jpg') }}" alt="toko bungaa" class="w-full h-auto object-cover">
            </div>
        </section>
        <!-- Features Section -->
        <section class="py-32 px-6 bg-white/50 dark:bg-black/20">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-20">
                    <h3 class="text-3xl font-bold mb-4">The Garden Journey</h3>
                    <p class="text-slate-500 dark:text-slate-400">Three simple steps to transform your space into a
                        floral
                        retreat.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div
                        class="flex flex-col items-center text-center p-8 rounded-2xl transition-all hover:bg-white dark:hover:bg-background-dark hover:shadow-xl group">
                        <div
                            class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mb-6 text-primary group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-3xl">fluid_med</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3">Choose Your Seeds</h4>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Select from our curated
                            collection of midnight-blooming flowers designed for beginners and experts.</p>
                    </div>
                    <div
                        class="flex flex-col items-center text-center p-8 rounded-2xl transition-all hover:bg-white dark:hover:bg-background-dark hover:shadow-xl group">
                        <div
                            class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mb-6 text-primary group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-3xl">water_drop</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3">Nurture Growth</h4>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Receive expert guidance on
                            soil, water, and light requirements tailored to your specific local environment.</p>
                    </div>
                    <div
                        class="flex flex-col items-center text-center p-8 rounded-2xl transition-all hover:bg-white dark:hover:bg-background-dark hover:shadow-xl group">
                        <div
                            class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mb-6 text-primary group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-3xl">eco</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3">Enjoy the Bloom</h4>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Transform your space into
                            a
                            peaceful sanctuary and witness the magic of nature unfolding at night.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="border-t border-primary/10 py-12 px-6">
            <div class="mt-12 text-center text-sm text-slate-400">
                © 2026 Luna Haldi. All rights reserved.
            </div>

    </footer>
</body>
</html>

