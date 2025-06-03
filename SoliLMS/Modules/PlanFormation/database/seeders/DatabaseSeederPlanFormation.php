<?php

namespace Modules\PlanFormation\database\seeders;

use Modules\PlanFormation\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;




class DatabaseSeederPlanFormation extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        $this->call([
            PlanAnnuelSeeder::class,
            FormateurSeeder::class,
            UserSeeder::class,
            ModuleSeeder::class,
            CompetenceSeeder::class,
            BriefProjetSeeder::class,
            EvaluationSeeder::class,
            SeanceSeeder::class,
        ]);
    }
}
