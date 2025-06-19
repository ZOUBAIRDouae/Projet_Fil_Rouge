<?php

namespace Modules\PlanFormation\database\seeders;

use Illuminate\Database\Seeder;
use Modules\PlanFormation\Models\Competence;

class CompetenceSeeder extends Seeder
{
    public function run(): void
    {
        $competences = [
            ['nom' => 'Analyse',      'description' => 'Analyse detailed requirements'],
            ['nom' => 'Conception',   'description' => 'Design system architecture'],
            ['nom' => 'Développement','description' => 'Write code to implement features'],
            ['nom' => 'Testing',      'description' => 'Ensure quality and reliability'],
        ];

        foreach ($competences as $data) {
            Competence::create($data);
        }
    }
}