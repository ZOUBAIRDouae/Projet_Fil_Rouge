<?php

namespace Modules\PlanFormation\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\PlanFormation\Models\User;

class SeanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $responsable = User::create([
            'name' => 'Responsable Formation',
            'email' => 'responsable@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $responsable->assignRole('responsable');

        $apprenant = User::create([
            'name' => 'Apprenant 1',
            'email' => 'apprenant1@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $apprenant->assignRole('apprenant');
    }
    
}
