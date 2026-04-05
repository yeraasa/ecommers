@extends('layouts.auth')

@section('title', 'Sign Up Midnight Bloom')

@section('content')

<div class="flex flex-col lg:flex-row w-full min-h-screen overflow-hidden">

    {{-- Left Side --}}
    <div class="hidden lg:flex lg:w-1/2 relative bg-background-dark items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center opacity-80"
            style="background-image: url('{{ asset('images/login-bg.jpg') }}');">
        </div>

        <div class="absolute inset-0 bg-gradient-to-t from-background-dark/80 to-transparent"></div>

        <div class="relative z-10 p-12 text-white max-w-lg">
            <div class="flex items-center gap-2 mb-8">
                <span class="material-symbols-outlined text-primary text-4xl">filter_vintage</span>
                <span class="text-2xl font-bold tracking-tight">Midnight Bloom</span>
            </div>

            <h1 class="text-5xl font-extrabold leading-tight mb-6">
                Experience the Art of Floral Elegance
            </h1>
        </div>
    </div>

    {{-- Right Side --}}
    <div class="flex-1 flex flex-col justify-center items-center px-6 py-12 lg:px-24 bg-white dark:bg-background-dark">

        <div class="w-full max-w-md">

            {{-- Header --}}
            <div class="mb-10 text-center lg:text-left">
                <h2 class="text-3xl font-extrabold text-slate-900 dark:text-slate-100 mb-2">
                    Welcome to Midnight Bloom
                </h2>
                <p class="text-slate-500 dark:text-slate-400">
                    Please enter your details to sign up.
                </p>
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ route('auth.signup.post') }}" class="space-y-6">
                @csrf


                <div>
                    <label class="block text-sm font-semibold mb-2">Name</label>
                    <input
                        type="text"
                        name="name"
                        required
                        class="w-full px-4 py-3.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-transparent focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"
                        placeholder="Name"
                        autocomplete="off"
                    >
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">Email Address</label>
                    <input
                        type="email"
                        name="email"
                        {{-- value="{{ ('email') }}" --}}
                        required
                        class="w-full px-4 py-3.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-transparent focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"
                        placeholder="name@gmail.com"
                        autocomplete="off"
                    >
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">Password</label>
                    <input
                        type="password"
                        name="password"
                        required
                        class="w-full px-4 py-3.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-transparent focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"
                        placeholder="••••••••"
                        autocomplete="off"
                    >
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-3.5 rounded-lg shadow-lg shadow-primary/20 transition-all active:scale-[0.98]">
                    Sign Up
                </button>
            </form>

            {{-- Footer --}}
            <p class="mt-10 text-center text-sm text-slate-500">
                Already have an account?
                <a href="{{ route('auth.signup') }}" class="font-semibold text-primary hover:text-primary/80">
                    Sign up
                </a>
            </p>

        </div>

        <div class="mt-auto pt-8 text-xs text-slate-400 dark:text-slate-500 w-full text-center">
            © {{ date('Y') }} Luna Haldi. All rights reserved.
        </div>

    </div>
</div>

@endsection
