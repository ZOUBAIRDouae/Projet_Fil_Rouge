<?php

namespace Modules\PlanFormation\Services;

use Modules\PlanFormation\Models\PlanAnnuel;
use Modules\PlanFormation\Models\Module;
use Modules\PlanFormation\Models\BriefProjet;
use Modules\PlanFormation\Models\Competence;
use Modules\PlanFormation\Models\User;



use Illuminate\Support\Facades\Auth;

use Modules\PlanFormation\Requests\PlanRequest;

class PlanService
{
    public function index($request)
    {
        $query = PlanAnnuel::query();

        // // Count for admin dashboard
        // $ModuleCount = Module::count();
        // $BriefProjetCount = BriefProjet::count();
        // $CompetenceCount = Competence::count();
        // $FormateurCount = Formateur::count();

        // Filtering
        if ($request->has('module') && $request->module != '') {
            $query->where('module_id', $request->module);
        }

        if ($request->has('brief') && $request->brief != '') {
            $query->whereHas('briefs', function ($query) use ($request) {
                $query->where('briefs.id', $request->brief);
            });
        }

        if ($request->has('search') && $request->search != '') {
            $query->where(function ($query) use ($request) {
                $query->where('module_id', 'like', '%' . $request->search . '%')
                      ->orWhere('brief_id', 'like', '%' . $request->search . '%');
            });
        }

        // Pagination
        $plans = $query->paginate(10);
        $plans->appends($request->all());

        $modules = Module::all();
        $briefs = BriefProjet::all();
        $competences = Competence::all();

        return compact('plans', 'modules', 'briefs', 'competences');
        // return compact('plans', 'modules', 'briefs', 'ArticleCount', 'CommentCount', 'UserCount');
    }

    public function create(PlanRequest $request)
    {
        $plan = PlanAnnuel::create([
            'module_id' => $request['module'],
            'brief_id' => $request['brief'],
            'competece_id' => $request['competence'],
            'user_id' => Auth::user()->id,
        ]);

        // $plan->modules()->attach($request->modules);
        $plan->briefs()->attach($request->briefs);
        $plan->competences()->attach($request->competences);

        return $plan;
    }

    public function show($id)
    {
        return PlanAnnuel::with(['module', 'briefs', 'competences'])->findOrFail($id);
    }

    public function update($request, $id)
    {
        $validated = $request->validate([
            'module' => 'required|exists:modules,id',
            'brief' => 'required|exists:briefs,id',
            'competence' => 'required|exists:competences,id',
            'briefs' => 'array',
            'briefs.*' => 'exists:briefs,id',
        ]);

        $plan = PlanAnnuel::findOrFail($id);
        $plan->update([
            'module_id' => $validated['module'],
            'brief_id' => $validated['brief'],
            'competence_id' => $validated['competence'],
        ]);

        $plan->briefs()->sync($validated['briefs'] ?? []);

        return $plan;
    }

    public function destroy($id)
    {
        $plan = PlanAnnuel::where('id', $id);
        $plan->delete();
    }
}
