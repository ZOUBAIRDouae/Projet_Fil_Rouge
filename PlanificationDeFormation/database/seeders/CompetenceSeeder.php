<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competence;

class CompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('competences')->insert([
            ['nom' => 'PHP', 'description' => 'Langage serveur'],
            ['nom' => 'UI/UX', 'description' => 'Design d’interface'],
        ]);
    }
}
