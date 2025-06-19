<?php

namespace Modules\PlanFormation\database\seeders;

use Illuminate\Database\Seeder;

class DatabaseSeederPlanFormation extends Seeder
{
    public function run(): void
    {
        $this->call([
            // 1) create users (if needed)
            UserSeeder::class,

            // 2) create formateurs
            FormateurSeeder::class,

            // 3) create annual plans
            PlanAnnuelSeeder::class,

            // 4) create modules, competences, briefs, evaluations, seances
            ModuleSeeder::class,
            CompetenceSeeder::class,
            BriefProjetSeeder::class,
            EvaluationSeeder::class,
            SeanceSeeder::class,
        ]);
    }
}