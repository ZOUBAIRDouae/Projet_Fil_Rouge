<?php

namespace Database\Seeders;

use Modules\PlanFormation\Models\User;
use Modules\PlanFormation\Models\Formateur;
use Modules\PlanFormation\database\seeders\DatabaseSeederPlanFormation;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        $this->call([
            RoleSeeder::class,
            RolePermissionSeeder::class,
            DatabaseSeederPlanFormation::class

        ]);
    }
}
