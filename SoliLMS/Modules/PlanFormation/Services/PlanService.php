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
        $plans = PlanAnnuel::with(['modules', 'briefProjets', 'competences'])->paginate(10);


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
        $plans->appends($request->all());

        $modules = Module::all();
        $briefs = BriefProjet::all();
        $competences = Competence::all();

        return compact('plans', 'modules', 'briefs', 'competences');
    }

    public function create(PlanRequest $request)
    {
        $plan = PlanAnnuel::create([
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'filiere' => $request->filiere,
            'formateur_id' => $request->formateur_id,
        ]);
    
        foreach ($request->modules as $id) {
            Module::where('id',$id)->update(['plan_annuel_id'=>$plan->id]);
        }
        foreach ($request->briefs as $id) {
            BriefProjet::where('id',$id)->update(['plan_annuel_id'=>$plan->id]);
        }
        foreach ($request->competences as $id) {
            Competence::where('id',$id)->update(['plan_annuel_id'=>$plan->id]);
        }
    
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
            'brief' => 'required|exists:brief_projets,id',
            'competence' => 'required|exists:competences,id',
            'briefs' => 'array',
            'briefs.*' => 'exists:brief_projets,id',
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
        $plan = PlanAnnuel::findOrFail($id);
        $plan->delete();
    }
}
