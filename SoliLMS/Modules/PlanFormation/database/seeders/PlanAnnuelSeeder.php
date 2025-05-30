<?php

namespace Modules\PlanFormation\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\PlanFormation\Models\PlanAnnuel;

class PlanAnnuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('plan_annuels')->insert([
            ['date_debut' => '2025-01-01', 'date_fin' => '2025-12-31', 'filiere' => 'DWB'],
            ['date_debut' => '2025-02-01', 'date_fin' => '2025-11-30', 'filiere' => 'DMB'],
        ]);
    }
}
