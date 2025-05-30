<?php

namespace Modules\PlanFormation\Controllers;

use Modules\PlanFormation\Services\CompetenceService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    protected $competenceService;

    public function __construct(CompetenceService $competenceService)
    {
        $this->competenceService = $competenceService;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            // 'commentable_id' => 'required|integer',
            // 'commentable_type' => 'required|string',
        ]);

        $this->competenceService->createCompetence($validated);
        return redirect()->back()->with('success', 'Competence créé avec succès');
    }

    public function destroy(string $id)
    {
        $this->competenceService->deleteCompetence($id);
        return redirect()->back()->with('success', 'Competence supprimé avec succès');
    }
}
