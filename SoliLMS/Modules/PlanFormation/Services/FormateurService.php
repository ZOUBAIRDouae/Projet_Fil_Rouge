<?php

namespace Modules\PlanFormation\Services;

use Modules\PlanFormation\Models\User;
use Modules\PlanFormation\Models\Formateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FormateurService
{
    
    public function createUserWithFormateur(array $userData, array $formateurData): User
    {
        return DB::transaction(function() use ($userData, $formateurData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make($userData['password']),
            ]);

            $formateurData['user_id'] = $user->id;
            Formateur::create([
                'user_id' => $formateurData['user_id'],
                'nom' => $formateurData['nom'],
                'prenom' => $formateurData['prenom'],
                'telephone' => $formateurData['telephone'],
            ]);

            return $user;
        });
    }
}
