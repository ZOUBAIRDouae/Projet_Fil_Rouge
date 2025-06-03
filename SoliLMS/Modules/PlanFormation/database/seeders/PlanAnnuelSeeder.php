<?php

namespace Modules\PlanFormation\database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\PlanFormation\Models\PlanAnnuel;
use Modules\PlanFormation\Models\Formateur;
use Modules\PlanFormation\Models\User;

class PlanAnnuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //         // Créer un utilisateur
        // $user = User::create([
        //     'name' => 'Formateur Test',
        //     'email' => 'formateur@test.com',
        //     'password' => bcrypt('password'),
                
        // ]);
        // $user->assignRole('formateur');
        //         // Créer un formateur lié à ce user
        //         $formateur = Formateur::create([
        //             'user_id' => $user->id,
        //             'nom' => 'Test',
        //             'prenom' => 'Formateur',
        //             'email' => $user->email,
        //             'telephone' => '0600000000',
        //             'motDePasse' => bcrypt('password'),
        // ]);

        DB::table('plan_annuels')->insert([
            [
                'date_debut' => '2025-01-01',
                'date_fin' => '2025-12-31',
                'filiere' => 'DWB',
                'formateur_id' => $formateur->id,
            ],
            [
                'date_debut' => '2025-02-01',
                'date_fin' => '2025-11-30',
                'filiere' => 'DMB',
                'formateur_id' => $formateur->id,
            ],
        ]);
    }
}
