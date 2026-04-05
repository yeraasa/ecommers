<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ManageProductss extends Controller
{
    public function index()
    {
        // retrieve paginated products for management
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.ManageProducts', compact('products'));
    }

    public function create()
    {
        return view('admin.AddProducts');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer|min:0',
            'category' => 'nullable|string|max:100',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'description' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

        // upload image
        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'category' => $request->category,
            'image' => $imagePath,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('manage-products.index')->with('success', 'Product successfully added.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.EditProduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer|min:0',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'description' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

        // update image if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'category' => $request->category,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('manage-products.index')->with('success', 'Product successfully updated.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        // optionally delete associated image file
        if ($product->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('manage-products.index')->with('success', 'Product successfully deleted.');
    }
}
