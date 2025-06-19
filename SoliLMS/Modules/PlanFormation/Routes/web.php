<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Modules\PlanFormation\Controllers\PlanController;
use Modules\PlanFormation\Controllers\BriefProjetController;
use Modules\PlanFormation\Controllers\ModuleController;
use Modules\PlanFormation\Controllers\CompetenceController;
use Modules\PlanFormation\Controllers\FormateurController;
use Modules\PlanFormation\Controllers\DashboardController;

// Authentication routes
Auth::routes();

// Home redirection based on role
Route::get('/', function () {
  if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('formateur') || Auth::user()->hasRole('apprenant')) {
    return redirect()->route('admin.dashboard');
  }
  abort(403);
})->middleware('auth');

// Routes for admin and formateur
Route::middleware(['auth', 'role:admin|formateur'])->group(function () {

  // Plans CRUD
  Route::prefix('plans')->name('plans.')->group(function () {
    Route::get('/', [PlanController::class, 'index'])->name('index');
    Route::get('create', [PlanController::class, 'create'])->name('create');
    Route::post('store', [PlanController::class, 'store'])->name('store');
    Route::get('{plan}', [PlanController::class, 'show'])->name('show');
    Route::get('{plan}/edit', [PlanController::class, 'edit'])->name('edit');
    Route::put('{plan}', [PlanController::class, 'update'])->name('update');
    Route::delete('{plan}', [PlanController::class, 'destroy'])->name('destroy');
  });

  // Briefs CRUD
  Route::prefix('briefs')->name('briefs.')->group(function () {
    Route::get('/', [BriefProjetController::class, 'index'])->name('index');
    Route::get('create', [BriefProjetController::class, 'create'])->name('create');
    Route::post('store', [BriefProjetController::class, 'store'])->name('store');
    Route::delete('{id}', [BriefProjetController::class, 'destroy'])->name('destroy');
  });

  // Modules CRUD
  Route::prefix('modules')->name('modules.')->group(function () {
    Route::get('/', [ModuleController::class, 'index'])->name('index');
    Route::get('create', [ModuleController::class, 'create'])->name('create');
    Route::post('store', [ModuleController::class, 'store'])->name('store');
    Route::delete('{module}', [ModuleController::class, 'destroy'])->name('destroy');
  });

  // Competences listing and creation
  Route::prefix('competences')->name('competences.')->group(function () {
    Route::get('/', [CompetenceController::class, 'index'])->name('index');
    Route::get('create', [CompetenceController::class, 'create'])->name('create');
    Route::post('store', [CompetenceController::class, 'store'])->name('store');
    Route::delete('{competence}', [CompetenceController::class, 'destroy'])->name('destroy');
  });

  // Formateurs CRUD
  Route::prefix('formateurs')->name('formateurs.')->group(function () {
    Route::get('/', [FormateurController::class, 'index'])->name('index');
    Route::get('create', [FormateurController::class, 'create'])->name('create');
    Route::post('store', [FormateurController::class, 'store'])->name('store');
    Route::get('{id}', [FormateurController::class, 'show'])->name('show');
  });

  // Dashboard routes
  Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
  Route::get('admin/dashboard/chart-data/{type}', [DashboardController::class, 'getChartData'])->name('admin.dashboard.chart-data');

  // Protected export/import
  Route::get('plan/export/{format?}', [PlanController::class, 'export'])->name('plan.export');
  Route::post('plans/import', [PlanController::class, 'import'])->name('plans.import');
});

// Fallback for any other unauthenticated access
Route::fallback(function () {
  return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
  Route::post('/store', [CompetenceController::class, 'store'])->name('competences.store');
  Route::delete('/{competence}', [CompetenceController::class, 'destroy'])->name('competences.destroy');
  Route::get('plan/export/{format?}', [PlanController::class, 'export'])->name('plan.export');
  Route::post('/plans/import', [PlanController::class, 'import'])->name('plans.import');
  Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
  Route::get('/admin/dashboard/chart-data/{type}', [DashboardController::class, 'getChartData'])->name('admin.dashboard.chart-data');
});
