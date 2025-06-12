<?php

namespace Modules\PlanFormation\Controllers;

use Modules\PlanFormation\Services\BriefProjetService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\PlanFormation\Models\Module;


class BriefProjetController extends Controller
{
    protected $briefService;

    public function __construct(BriefProjetService $briefService)
    {
        $this->briefService = $briefService;
    }

    public function index(Request $request)
    {
        $briefs = $this->briefService->getBriefs($request->search ?? '');

        if (Auth::check() && Auth::user()->roles->contains('name', 'admin')) {
            return view('PlanFormation::admin.brief.index', $data);
        } else {
            return view('PlanFormation::admin.brief.index', compact('briefs'));
        }
        
       


    }

    public function create()
    {
        $modules = Module::all();
        return view('PlanFormation::admin.brief.create' , compact('modules'));
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'statut' => 'required|string',
            'module' => 'required|exists:modules,id',
        ]);

        $this->briefService->createBrief($validated);
        return redirect()->route('briefs.index')->with('success', 'Le brief a bien été créé');
    }

    public function destroy(string $id)
    {
        $this->briefService->deleteBrief($id);
        return redirect()->route('briefs.index')->with('success', 'Le brief a bien été supprimé');
    }
}
