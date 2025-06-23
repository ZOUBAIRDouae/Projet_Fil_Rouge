<?php

namespace Modules\PlanFormation\App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class PlanServiceProvider extends ServiceProvider
{
    // protected $policies = [
    //     PlanAnnuel::class => PlanPolicy::class,
    // ];
    
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../Routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../../Resources/views', 'PlanFormation');
        $this->loadTranslationsFrom(__DIR__.'/../../lang' , 'PlanFormation');
        $this->publishes([
            __DIR__.'/../../Resources/views' => resource_path('views/vendor/PlanFormation'),
        ], 'PlanFormation-views');
        
        
    }

    public function register()
    {
        // Enregistrer d'autres services si nécessaire
    }
}