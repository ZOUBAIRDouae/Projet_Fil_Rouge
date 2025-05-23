<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seance;

class SeanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('seances')->insert([
            [
                'date_debut' => '2025-03-01',
                'date_fin' => '2025-03-05',
                'num_semaine' => 9,
                'heures' => 20,
                'plan_annuel_id' => 1,
                'formateur_id' => 1,
                'module_id' => 1,
            ],
            [
                'date_debut' => '2025-04-10',
                'date_fin' => '2025-04-15',
                'num_semaine' => 15,
                'heures' => 15,
                'plan_annuel_id' => 2,
                'formateur_id' => 2,
                'module_id' => 2,
            ],
        ]);
    }
}
