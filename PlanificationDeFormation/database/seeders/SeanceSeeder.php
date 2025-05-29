<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('seances')->insert([
            [
                'heure_debut' => '2025-03-01 09:00:00',
                'heure_fin' => '2025-03-01 12:00:00',
                'num_semaine' => 9,
                'heures' => 3,
                'plan_annuel_id' => 1,
                'formateur_id' => 1,
                'module_id' => 1,
            ],
            [
                'heure_debut' => '2025-04-10 14:00:00',
                'heure_fin' => '2025-04-10 17:00:00',
                'num_semaine' => 15,
                'heures' => 3,
                'plan_annuel_id' => 2,
                'formateur_id' => 2,
                'module_id' => 2,
            ],
        ]);
    }
}
