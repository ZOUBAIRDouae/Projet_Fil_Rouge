<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Modules\PlanFormation\App\Providers\PlanServiceProvider;

use Modules\PlanFormation\Models\PlanAnnuel;
use Modules\PlanFormation\App\Policies\PlanPolicy;

class AppServiceProvider extends ServiceProvider
{

    // protected $policies = [
    //     PlanAnnuel::class => PlanPolicy::class,
    // ];
    
    public function register(): void
    {
        $this->app->register(PlanServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrap();
        
    }
}
