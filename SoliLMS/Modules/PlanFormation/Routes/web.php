<?php

use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Auth;

use Modules\PlanFormation\Controllers\PlanController;
use Modules\PlanFormation\Controllers\BriefProjetController;
use Modules\PlanFormation\Controllers\ModuleController;
use Modules\PlanFormation\Controllers\CompetenceController;




Auth::routes();

Route::prefix('plans')->group(function () {
  Route::get('/', [PlanController::class, 'index'])->name('plans.index');
  Route::get('/create', [PlanController::class, 'create'])->name('plans.create');
  Route::post('/store', [PlanController::class, 'store'])->name('plans.store');
  Route::get('/{plan}', [PlanController::class, 'show'])->name('plans.show');
  Route::get('/{plan}/edit', [PlanController::class, 'edit'])->name('plans.edit');
  Route::put('/{plan}', [PlanController::class, 'update'])->name('plans.update');
  Route::delete('/{plan}', [PlanController::class, 'destroy'])->name('plans.destroy');
});


Route::middleware('auth' , 'role:admin')->group(function () { 
  Route::prefix('briefs')->group(function () {
    Route::get('/', [BriefProjetController::class, 'index'])->name('briefs.index');
    Route::get('/create', [BriefProjetController::class, 'create'])->name('briefs.create');
    Route::post('/store', [BriefProjetController::class, 'store'])->name('briefs.store');
    Route::delete('/briefs/{id}', [BriefProjetController::class, 'destroy'])->name('briefs.destroy');
});

  Route::prefix('modules')->group(function () {
    Route::get('/', [ModuleController::class, 'index'])->name('modules.index');
    Route::get('/create', [ModuleController::class, 'create'])->name('modules.create');
    Route::post('/store', [ModuleController::class, 'store'])->name('modules.store');
    Route::delete('/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy');
});
});


Route::get('/',[ PlanController::class , 'index'])->name('public.index');
Route::get('/{plan}',[ PlanController::class , 'show'])->name('public.show');





Auth::routes();


Route::middleware('auth')->group(function () {
  Route::post('/store', [CompetenceController::class, 'store'])->name('competences.store');
  Route::delete('/{competence}', [CompetenceController::class, 'destroy'])->name('competences.destroy');
 
});


Route::get('plan/export/{format?}', [PlanController::class, 'export'])->name('plan.export');
Route::post('/plans/import', [PlanController::class, 'import'])->name('plans.import');






