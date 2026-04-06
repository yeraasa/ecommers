@extends('layouts.app')

@section('title', 'MidnightBloom - Order Success')

@section('content')
    <main class="max-w-7xl mx-auto px-4 py-16 text-center">
        <div class="mb-8">
            <span class="material-symbols-outlined text-primary text-7xl select-none"
                style="font-variation-settings:'FILL' 1">check_circle</span>
        </div>

        <h2 class="text-4xl font-bold mb-4">Thank You for Your Order!</h2>
        <p class="text-lg text-gray-600 mb-8 max-w-lg mx-auto">
            Your order has been placed successfully and is being processed. We'll notify you when it's on its way!
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('products.index') }}"
                class="bg-primary text-white font-bold px-8 py-3 rounded-xl hover:bg-opacity-90 transition-all">
                Continue Shopping
            </a>
            {{-- <a href="#"
                class="border border-gray-300 text-gray-700 font-bold px-8 py-3 rounded-xl hover:bg-gray-50 transition-all">
                View My Orders
            </a> --}}
        </div>
    </main>
@endsection
