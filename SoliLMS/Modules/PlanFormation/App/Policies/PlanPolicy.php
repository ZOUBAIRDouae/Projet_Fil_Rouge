<?php

namespace Modules\PlanFormation\App\Policies;

use Modules\PlanFormation\Models\PlanAnnuel;
use Modules\PlanFormation\Models\User;
use Illuminate\Auth\Access\Response;

class PlanPolicy
{
    public function viewAny(User $user): bool
    {
        return false;
        // return $user->hasRole('responsable') || $user->hasRole('formateur') || $user->hasPermissionTo('plan.view');
    }
   
    public function view(User $user, PlanAnnuel $plan): bool|Response
    {
        return false;
        // return $user->hasRole('responsable') || $user->hasRole('formateur') || $user->hasPermissionTo('plan.view');
    }    
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PlanAnnuel $plan): bool
    {
        return $user->id === $plan->user_id && $user->hasPermissionTo('edit');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PlanAnnuel $plan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PlanAnnuel $plan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PlanAnnuel $plan): bool
    {
        return false;
    }
}
