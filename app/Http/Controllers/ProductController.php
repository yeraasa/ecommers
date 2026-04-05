<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::all();
        return view('user.home', compact('items'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query && trim($query) !== '') {
            $items = Product::where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%');
            })->get();
        } else {
            $items = collect();
        }

        return view('user.category', compact('items'));
    }

    public function detail($id)
    {
        $item = Product::find($id);
        return view('user.DetailProducts', compact('item'));
    }
}
