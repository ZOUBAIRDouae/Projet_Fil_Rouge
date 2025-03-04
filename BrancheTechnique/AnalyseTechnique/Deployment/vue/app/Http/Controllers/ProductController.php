<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{

    public function index(){
        $products = Product::query();
        $products = $products->latest()->get();

        return response()->json([
            'products' => $products
        ], 200);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required',
            'quantity'  => 'required',
            'price' => 'required'

        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->description = $request->description;

        if($request->image != ""){
            $strpos = strpos($request->image, ';');
            $sub = substr($request->image,0,$strpos);
            $ex = explode('/' , $sub)[1];
            $name = time().".".$ex;
            $img = Image::read($request->image)->resize(200,200);
            $upload_path = public_path() ."/upload/";
            $img->save($upload_path . $name);
            $product->image = $name;

        } else{
            $product->image = "no-image.png";
        }
        
        $product->type = $request->type;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->save();

    

    }
}
