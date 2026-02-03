<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', 1)->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $tax = $subtotal * 0.1;
        $total = $subtotal + $tax;

        return view('cart', compact('cartItems', 'subtotal', 'tax', 'total'));
    }

    public function store(Request $request)
    {
        $productId = $request->product_id;

        $product = Product::findOrFail($productId);

        $cartItem = Cart::where('user_id', 1)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => 1,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Berhasil menambahkan ' . $product->name);
    }

    public function update(Request $request, Cart $cart)
    {
        if ($request->action === 'plus') {
            $cart->increment('quantity');
        } elseif ($request->action === 'minus') {
            if ($cart->quantity > 1) {
                $cart->decrement('quantity');
            } else {
                $cart->delete();
            }
        }

        return redirect()->back();
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->back()->with('success', 'Item removed.');
    }
}