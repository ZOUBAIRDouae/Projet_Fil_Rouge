<?php

namespace Modules\PlanFormation\Controllers;

use App\Http\Controllers\Controller;

use Modules\PlanFormation\Models\PlanAnnuel;
use Modules\PlanFormation\Models\Module;
use Modules\PlanFormation\Models\BriefProjet;
use Modules\PlanFormation\Models\Competence;


use Modules\PlanFormation\Services\PlanService;
use Modules\PlanFormation\Requests\PlanRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Facades\Excel;
use Modules\PlanFormation\App\Exports\PlanExport;
use Modules\PlanFormation\App\Imports\PlanImport;




class PlanController extends Controller
{
    protected $planService;

    public function __construct(PlanService $planService)
    {
        $this->planService = $planService;
    }

    public function index(Request $request)
    {
        $data = $this->planService->index($request);
        
        if (Auth::check() && Auth::user()->roles->contains('name', 'formateur')) {
            return view('PlanFormation::admin.plan.index', $data);
        } else {
            return view('PlanFormation::public.index', $data);
        }
    }

    public function create()    
    {
        if (!Auth::check() || !Auth::user()->roles->contains('name', 'formateur')) {
            return redirect()->route('plans.index');
        }

        $modules = Module::all();
        $briefs = BriefProjet::all();
        $competences = Competence::all();

        return view('PlanFormation::admin.plan.create', compact('modules', 'briefs', 'competences'));
    }

    public function store(PlanRequest $request)
    {
        if (!Auth::check() || !Auth::user()->roles->contains('name', 'formateur')) {
            return redirect()->route('plans.index');
        }

        $this->planService->create($request);

        return redirect()->route('plans.index')->with('success', 'Plan a bien été créé');
    }

    public function show(string $id)
    {
        $plan = $this->planService->show($id);

        if (Auth::check() && Auth::user()->roles->contains('name', 'formateur')) {
            return view('PlanFormation::admin.plan.show', compact('plan'));
        } else {
            return view('PlanFormation::public.show', compact('plan'));
        }
    }

    public function edit($id)
    {
        if (!Auth::check() || !Auth::user()->roles->contains('name', 'fomateur')) {
            return redirect()->route('plans.index');
        }

        $plan = PlanAnnuel::findOrFail($id);
        $this->authorize('edit', $plan);
        $modules = Module::all();
        $briefs = BriefProjet::all();
        $competences = Competence::all();
        $selectedBriefs = $plan->briefs->pluck('id')->toArray();

        return view('PlanFormation::admin.plan.edit', compact('plan', 'modules', 'briefs', 'selectedBriefs', 'competences'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check() || !Auth::user()->roles->contains('name', 'formateur')) {
            return redirect()->route('plans.index');
        }

        $this->planService->update($request, $id);

        return redirect()->route('plans.index')->with('success', 'Plan a bien été modifié');
    }

    public function destroy(string $id)
    {
        if (!Auth::check() || !Auth::user()->roles->contains('name', 'formateur')) {
            return redirect()->route('plans.index');
        }

        $this->planService->destroy($id);

        return redirect()->route('plans.index')->with('success', 'Plan a bien été supprimé');
    }

    public function export($format = 'xlsx')
    {
        $allowedFormats = ['csv', 'xlsx'];

        if (!in_array($format, $allowedFormats)) {
            return redirect()->back()->with('error', 'Invalid format.');
        }

        return Excel::download(new PlanExport, "article.$format", $format === 'csv' ? \Maatwebsite\Excel\Excel::CSV : \Maatwebsite\Excel\Excel::XLSX);

    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,txt',
        ]);

        

        Excel::import(new PlanImport, $request->file('file'));

        return redirect()->back()->with('success', 'Plan importés avec succès !');
    }


}


