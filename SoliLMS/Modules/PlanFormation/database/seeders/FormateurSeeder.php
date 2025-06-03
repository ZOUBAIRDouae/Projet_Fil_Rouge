<?php

namespace Modules\PlanFormation\database\seeders;

use Illuminate\Database\Seeder;
use Modules\PlanFormation\Models\Formateur;
use Modules\PlanFormation\Models\User;

class FormateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formateurs = [
            [
                'nom' => 'BOUZIANE',
                'prenom' => 'imane',
                'email' => 'imane@gmail.com',
                'telephone' => '0612345678',
                'password' => bcrypt('formateur'),
            ],
            [
                'nom' => 'ESSARRAJ',
                'prenom' => 'Fouad',
                'email' => 'fouad@gmail.com',
                'telephone' => '0698765432',
                'password' => bcrypt('formateur'),
            ],
            [
                'nom' => 'CHEBAB',
                'prenom' => 'Fatin',
                'email' => 'fatin@gmail.com',
                'telephone' => '0698765432',
                'password' => bcrypt('formateur'),
            ],
            [
                'nom' => 'SOKLABI',
                'prenom' => 'Abdellatif',
                'email' => 'soklabi@gmail.com',
                'telephone' => '0698765432',
                'password' => bcrypt('formateur'),
            ],
            [
                'nom' => 'EL MASOUDI',
                'prenom' => 'Masoudi',
                'email' => 'masoudi@gmail.com',
                'telephone' => '0698765432',
                'password' => bcrypt('formateur'),
            ],
        ];

        foreach ($formateurs as $data) {
            //Crée l'utilisateur lié au formateur
            $user = User::create([
                'name' => $data['prenom'] . ' ' . $data['nom'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

           
            $user->assignRole('formateur');

            // 2. Crée le formateur en liant user_id
            Formateur::create([
                'user_id' => $user->id,
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'telephone' => $data['telephone'],
                // Ne mets pas le mot de passe ici, il est dans users
            ]);
        }
    }
}
