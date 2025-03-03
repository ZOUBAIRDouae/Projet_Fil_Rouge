<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formations = [
            [
                'nom' => 'Développement Web',
                'description' => 'Formation complète pour apprendre à créer des sites web dynamiques.',
                'date_debut' => '2025-02-01',
                'date_fin' => '2025-08-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nom' => 'Développement Mobile',
                'description' => 'Formation complète pour apprendre à créer des Appliquation mobile.',
                'date_debut' => '2025-02-01',
                'date_fin' => '2025-08-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];
    }
}
