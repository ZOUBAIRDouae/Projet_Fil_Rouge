<?php

namespace Modules\PlanFormation\Controllers;

use Modules\PlanFormation\Services\EvaluationService;
use Modules\PlanFormation\Models\BriefProjet;
use Modules\PlanFormation\Models\Module;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    protected $evaluationService;

    public function __construct(EvaluationService $evaluationService)
    {
        $this->evaluationService = $evaluationService;
    }

    public function index(Request $request)
    {
        $evaluations = $this->evaluationService->getAllEvaluations();
        return view('PlanFormation::admin.evaluation.index', compact('evaluations'));
    }

    public function create(){
        $modules = Module::all();
        $briefs = BriefProjet::all();
        return view('PlanFormation::admin.evaluation.create' , compact('briefs' , 'modules'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'module_id' => 'required|exists:modules,id', 
            'brief_projet_id' => 'required|exists:brief_projets,id',   
        ]);

      
        $this->evaluationService->createEvaluation($validated);
        return redirect()->route('evaluations.index')->with('success', 'Type créé avec succès');
    }

    public function destroy(string $id)
    {
        $this->evaluationService->deleteEvaluation($id);
        return redirect()->route('evaluations.index')->with('success', 'Type supprimé avec succès');
    }
}
