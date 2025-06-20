<?php

namespace Modules\PlanFormation\Services;

use Modules\PlanFormation\Models\Evaluation;

class EvaluationService
{
    
    public function getAllEvaluations()
    {
        return Evaluation::paginate(5);
    }

    public function createEvaluation(array $data)
    {
        return Evaluation::create($data);
    }

    public function deleteEvaluation(string $id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $evaluation->delete();
    }
}
