<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SessionsTableSeeder extends Seeder
{

    public function run(): void
    {
        $sessions_plans = [
            [
                'nom' => 'SAS ',
                'num_session' => 1,
                'semaine_session' => 38,
                'objectif_session' => 'Présentation de plan de formation.',
                'sujet' => 'Présentation des modules',
                'mini_projet' => 'Application pour la gestion des apprenants',
                'evaluation' => 'CC1 SAS',
                'date_debut' => Carbon::parse('2025-02-01'),
                'date_fin' => Carbon::parse('2025-02-28'),
                'user_id' => 1, 
                'plan_id' => 1,  
                'formation_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nom' => 'POO PHP ',
                'num_session' => 2,
                'semaine_session' => 39,
                'objectif_session' => 'Maitrisez POO en PHP!',
                'sujet' => 'Introduction à POO',
                'mini_projet' => 'Application de gestion de bibliothèque',
                'evaluation' => 'CC2 SAS',
                'date_debut' => Carbon::parse('2025-01-15'),
                'date_fin' => Carbon::parse('2025-01-26 '),
                'user_id' => 2, 
                'plan_id' => 2,  
                'formation_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
    }
}
