<?php

namespace Modules\PlanFormation\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\PlanFormation\Models\Evaluation;

class SeanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('evaluations')->insert([
            [
                'type' => 'CC',
                'brief_projet_id' => 1,
            ],
            [
                'type' => 'EFM',
                'brief_projet_id' => 2,
            ],
        ]);
    }
}
