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
        $query = PlanAnnuel::with(['modules', 'briefProjets', 'competences']);
    
        // Filtrer par module sélectionné (id)
        if ($request->has('module') && $request->module != '') {
            $query->whereHas('modules', function ($q) use ($request) {
                $q->where('id', $request->module);
            });
        }
    
        // Filtrer par brief sélectionné (id)
        if ($request->has('brief') && $request->brief != '') {
            $query->whereHas('briefProjets', function ($q) use ($request) {
                $q->where('id', $request->brief);
            });
        }
    
        // Filtre de recherche globale
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
    
            $query->where(function ($q) use ($search) {
                $q->where('filiere', 'like', "%$search%")
                  ->orWhereHas('modules', function ($mq) use ($search) {
                      $mq->where('nom', 'like', "%$search%");
                  })
                  ->orWhereHas('briefProjets', function ($bq) use ($search) {
                      $bq->where('titre', 'like', "%$search%");
                  })
                  ->orWhereHas('competences', function ($cq) use ($search) {
                      $cq->where('nom', 'like', "%$search%");
                  });
            });
        }
    
        // Pagination
        $plans = $query->paginate(10);
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
        return PlanAnnuel::with(['modules', 'briefProjets', 'competences'])->findOrFail($id);
    }

    public function update($request, $id)
    {
        $validated = $request->validate([
            'modules' => 'required|array|min:1',
            'modules.*' => 'exists:modules,id',
            'briefs' => 'required|array|min:1',
            'briefs.*' => 'exists:brief_projets,id',
            'competences' => 'required|array|min:1',
            'competences.*' => 'exists:competences,id',
    ]);

        $plan = PlanAnnuel::findOrFail($id);

        // Réinitialiser les anciennes associations
        Module::where('plan_annuel_id', $plan->id)->update(['plan_annuel_id' => null]);
        BriefProjet::where('plan_annuel_id', $plan->id)->update(['plan_annuel_id' => null]);
        Competence::where('plan_annuel_id', $plan->id)->update(['plan_annuel_id' => null]);


        foreach ($validated['modules'] as $moduleId) {
            Module::where('id', $moduleId)->update(['plan_annuel_id' => $plan->id]);
        }

        foreach ($validated['briefs'] as $briefId) {
            BriefProjet::where('id', $briefId)->update(['plan_annuel_id' => $plan->id]);
        }

        foreach ($validated['competences'] as $competenceId) {
            Competence::where('id', $competenceId)->update(['plan_annuel_id' => $plan->id]);
        }

        return $plan;
}

    public function destroy($id)
    {
        $plan = PlanAnnuel::findOrFail($id);
        $plan->delete();
    }
}
