<?php

namespace Modules\PlanFormation\database\seeders;

use Illuminate\Database\Seeder;
use Modules\PlanFormation\Models\Evaluation;
use Modules\PlanFormation\Models\BriefProjet;

class EvaluationSeeder extends Seeder
{
    public function run(): void
    {
        $briefs = BriefProjet::all();

        foreach ($briefs as $brief) {
            Evaluation::create([
                'type'           => 'Quiz',
                'brief_projet_id' => $brief->id,
            ]);

            Evaluation::create([
                'type'           => 'Examen',
                'brief_projet_id' => $brief->id,
            ]);
        }
    }
}