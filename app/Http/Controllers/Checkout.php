<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Keranjang belanja kosong.');
        }

        $subtotal = $this->calculateSubtotal($cart);

        return view('store.checkout', compact('cart', 'subtotal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:1000',
            'payment_method'   => 'required|string|in:bank_transfer,cod,credit_card',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Keranjang sudah kedaluwarsa.');
        }

        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id'          => Auth::id(),
                'total_amount'     => $this->calculateSubtotal($cart),
                'status'           => 'pending',
                'shipping_address' => $request->shipping_address,
                'payment_method'   => $request->payment_method,
            ]);

            foreach ($cart as $productId => $item) {
                $product = Product::lockForUpdate()->find($productId);

                if (!$product || $product->stock < $item['quantity']) {
                    throw new \Exception("Produk {$item['name']} kehabisan stok.");
                }

                $product->decrement('stock', $item['quantity']);

                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $productId,
                    'quantity'   => $item['quantity'],
                    'unit_price' => $item['price'],
                ]);
            }

            session()->forget('cart');

            DB::commit();

            return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat! ID Order: #' . $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    private function calculateSubtotal($cart)
    {
        return array_reduce($cart, function ($total, $item) {
            return $total + ($item['price'] * $item['quantity']);
        }, 0);
    }
}
