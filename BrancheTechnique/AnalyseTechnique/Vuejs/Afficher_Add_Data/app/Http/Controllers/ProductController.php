<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        // Récupère tous les produits de la base de données
        $products = Product::all();

        // Retourne la vue Inertia avec la liste des produits
        return Inertia::render('Product', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // Crée le produit en base de données
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Retourne la vue Inertia avec la liste mise à jour et le produit créé
        // Cela permet à votre callback onSuccess d'accéder à response.props.product
        return Inertia::render('Product', [
            'products' => Product::all(),
            'product'  => $product,
        ])->with('success', 'Product created successfully.');
    }
}
