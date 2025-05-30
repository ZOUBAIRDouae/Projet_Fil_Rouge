<?php

use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Auth;

use Modules\Blog\Controllers\ArticleController;
use Modules\Blog\Controllers\CategoryController;
use Modules\Blog\Controllers\CommentController;
use Modules\Blog\Controllers\TagController;




Auth::routes();

Route::prefix('articles')->group(function () {
  Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
  Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
  Route::post('/store', [ArticleController::class, 'store'])->name('articles.store');
  Route::get('/{article}', [ArticleController::class, 'show'])->name('articles.show');
  Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
  Route::put('/{article}', [ArticleController::class, 'update'])->name('articles.update');
  Route::delete('/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});


Route::middleware('auth' , 'role:admin')->group(function () { 
  Route::prefix('tags')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('tags.index');
    Route::get('/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/store', [TagController::class, 'store'])->name('tags.store');
    Route::delete('/tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');
});

  Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
});


Route::get('/',[ ArticleController::class , 'index'])->name('public.index');
Route::get('/{article}',[ ArticleController::class , 'show'])->name('public.show');





Auth::routes();


Route::middleware('auth')->group(function () {
  Route::post('/store', [CommentController::class, 'store'])->name('comments.store');
  Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
 
});


Route::get('article/export/{format?}', [ArticleController::class, 'export'])->name('article.export');
Route::post('/articles/import', [ArticleController::class, 'import'])->name('articles.import');






