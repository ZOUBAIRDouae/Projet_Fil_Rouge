<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return Inertia::render('TestPage', ['products' => $products]);
    }

    public function store(Request $request)
    {
        // Validate input (optional for beginners)
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        $product = Product::create($request->only('name', 'description', 'quantity'));

        // If using Inertia, you can send back the newly created product as a prop
        return back()->with('success', 'Product created!')->with('product', $product);
    }

}
