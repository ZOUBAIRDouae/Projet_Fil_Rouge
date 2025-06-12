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

    public function index(Request $request)
    {
        $competences = $this->competenceService->getAllCompetences();
        return view('PlanFormation::admin.competence.index', compact('competences'));
    }

    public function create(){
        return view('PlanFormation::admin.competence.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required',
            'description' => 'required',
        ]);

      
        $this->competenceService->createCompetence($validated);
        return redirect()->route('competences.index')->with('success', 'Competence créé avec succès');
    }

    public function destroy(string $id)
    {
        $this->competenceService->deleteCompetence($id);
        return redirect()->route('competences.index')->with('success', 'Competence supprimé avec succès');
    }
}
