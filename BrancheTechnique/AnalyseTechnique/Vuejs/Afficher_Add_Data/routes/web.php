<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/Product' , function(){
    return Inertia::render('Product');
})->name('Product');

use App\Http\Controllers\ProductController;

Route::get('/Product', [ProductController::class, 'index'])->name('Product');

Route::post('/Product',[ProductController::class, 'store']);


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
