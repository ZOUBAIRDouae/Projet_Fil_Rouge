<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{pathMatch}' , function(){
    return view('welcome');
})->where('pathMatch' , ".*");




use App\Http\Controllers\ProductController;

Route::post('/products' , [ProductController::class , 'store']);
Route::get('/products' , [ProductController::class , 'index']);