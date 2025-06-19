<?php

namespace Modules\PlanFormation\database\seeders;

use Illuminate\Database\Seeder;
use Modules\PlanFormation\Models\User;
use Modules\PlanFormation\Models\Formateur;

class FormateurSeeder extends Seeder
{
    public function run(): void
    {
        $formateurs = [
            ['nom'=>'BOUZIANE',   'prenom'=>'Imane',     'telephone'=>'0612345678','password'=>bcrypt('formateur')],
            ['nom'=>'ESSARRAJ',   'prenom'=>'Fouad',     'telephone'=>'0698765432','password'=>bcrypt('formateur')],
            ['nom'=>'CHEBAB',     'prenom'=>'Fatin',     'telephone'=>'0698765432','password'=>bcrypt('formateur')],
            ['nom'=>'SOKLABI',    'prenom'=>'Abdellatif','telephone'=>'0698765432','password'=>bcrypt('formateur')],
            ['nom'=>'EL MASOUDI', 'prenom'=>'Masoudi',   'telephone'=>'0698765432','password'=>bcrypt('formateur')],
        ];

        foreach ($formateurs as $data) {
            $email = strtolower($data['prenom'].'.'.$data['nom']) . '@example.test';

            $user = User::create([
                'name'     => $data['prenom'].' '.$data['nom'],  
                'email'    => $email,
                'password' => $data['password'],
            ]);

            $user->assignRole('formateur');

            Formateur::create([
                'user_id'   => $user->id,
                'nom'       => $data['nom'],  
                'prenom'    => $data['prenom'],  
                'telephone' => $data['telephone'],
            ]);
        }
    }
}