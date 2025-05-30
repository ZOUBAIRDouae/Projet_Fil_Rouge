<?php

namespace Modules\PlanFormation\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\PlanFormation\Models\Evaluation;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('evaluations')->insert([
            ['type' => 'examen', 'brief_projet_id' => 1],
            ['type' => 'presentation', 'brief_projet_id' => 2],
        ]);
    }
}
