<?php

use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Auth;

use Modules\PlanFormation\Controllers\PlanController;
use Modules\PlanFormation\Controllers\BriefProjetController;
use Modules\PlanFormation\Controllers\ModuleController;
use Modules\PlanFormation\Controllers\CompetenceController;
use Modules\PlanFormation\Controllers\FormateurController;
use Modules\PlanFormation\Controllers\EvaluationController;




Auth::routes();

Route::get('/' , function (){
  return view('auth.login');
});


Route::middleware('auth' , 'role:admin|formateur|responsable')->group(function () { 

  Route::prefix('plans')->group(function () {
    Route::get('/', [PlanController::class, 'index'])->name('plans.index');
    Route::get('/create', [PlanController::class, 'create'])->name('plans.create');
    Route::post('/store', [PlanController::class, 'store'])->name('plans.store');
    Route::get('/{plan}', [PlanController::class, 'show'])->name('plans.show');
    Route::get('/{plan}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::put('/{plan}', [PlanController::class, 'update'])->name('plans.update');
    Route::delete('/{plan}', [PlanController::class, 'destroy'])->name('plans.destroy');
  });
  

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
Route::prefix('competences')->group(function () {
  Route::get('/', [CompetenceController::class, 'index'])->name('competences.index');
  Route::get('/create', [CompetenceController::class, 'create'])->name('competences.create');
});
Route::prefix('evaluations')->group(function () {
  Route::get('/', [EvaluationController::class, 'index'])->name('evaluations.index');
  Route::get('/create', [EvaluationController::class, 'create'])->name('evaluations.create');
  Route::post('/store', [EvaluationController::class, 'store'])->name('evaluations.store');
  Route::delete('/{evaluation}', [EvaluationController::class, 'destroy'])->name('evaluations.destroy');
});
Route::prefix('formateurs')->group(function () {
  Route::get('/', [FormateurController::class, 'index'])->name('formateurs.index');
  Route::get('formateurs/create', [FormateurController::class, 'create'])->name('formateurs.create');
  Route::post('/', [FormateurController::class, 'store'])->name('formateurs.store');
  Route::get('formateurs/{id}', [FormateurController::class, 'show'])->name('formateurs.show');
});
});


Route::middleware('auth')->group(function () {
  Route::post('/store', [CompetenceController::class, 'store'])->name('competences.store');
  Route::delete('/{competence}', [CompetenceController::class, 'destroy'])->name('competences.destroy');
 
});


Route::get('plan/export/{format?}', [PlanController::class, 'export'])->name('plan.export');
Route::post('/plans/import', [PlanController::class, 'import'])->name('plans.import');





use Modules\PlanFormation\Controllers\DashboardController;
// Route pour le dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Route AJAX pour les données des graphiques
Route::get('/admin/dashboard/chart-data/{type}', [DashboardController::class, 'getChartData'])->name('admin.dashboard.chart-data');







