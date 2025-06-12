<?php

namespace Modules\PlanFormation\Services;

use Modules\PlanFormation\Models\Competence;

class CompetenceService
{
    
    public function getAllCompetences()
    {
        return Competence::paginate(10);
    }

    public function createCompetence(array $data)
    {
        return Competence::create($data);
    }

    public function deleteCompetence(string $id)
    {
        $competence = Competence::findOrFail($id);
        $competence->delete();
    }
}
