<?php

namespace Modules\PlanFormation\App\Policies;

use Modules\PlanFormation\Models\PlanAnnuel;
use Modules\PlanFormation\Models\User;
use Illuminate\Auth\Access\Response;

class PlanPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['responsable', 'formateur', 'apprenant']) 
            || $user->hasPermissionTo('voir plan');
    }    
   
    public function view(User $user): bool
    {
        
        return $user->hasRole('responsable') || $user->hasRole('formateur') || $user->hasRole('apprenant') || $user->hasPermissionTo('voir plan');
    }    
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        
        return $user->hasRole('formateur') || $user->hasPermissionTo('ajouter plan');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PlanAnnuel $plan): bool
    {
        return $user->hasRole('formateur') || $user->hasPermissionTo('modifier plan');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PlanAnnuel $plan): bool
    { 
        return $user->hasRole('formateur') || $user->hasPermissionTo('supprimer plan');
    }
    public function show(User $user): bool
    {
        
        return $user->hasRole('formateur');
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
