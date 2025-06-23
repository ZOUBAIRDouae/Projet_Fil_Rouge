<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\PlanFormation\Models\PlanAnnuel;
use Modules\PlanFormation\App\Policies\PlanPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        PlanAnnuel::class => PlanPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        // other boot logic if any
    }
}
