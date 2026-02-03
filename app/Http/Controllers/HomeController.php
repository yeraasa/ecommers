<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $items = [
            [
                'name' => 'Bowl',
                'price' => 18,
                'image' => 'images/items/bowl.jpg',
            ],
            [
                'name' => 'Collar',
                'price' => 24,
                'image' => 'images/items/collar.jpg',
            ],
            [
                'name' => 'Rope',
                'price' => 12,
                'image' => 'images/items/rope.jpg',
            ],
            [
                'name' => 'Treats',
                'price' => 9,
                'image' => 'images/items/treats.jpg',
            ],
            [
                'name' => 'Bath',
                'price' => 15,
                'image' => 'images/items/bath.jpg',
            ],
        ];

        // return view('home', compact('items'));
    }
}
