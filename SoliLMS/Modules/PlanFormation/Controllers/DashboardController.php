<?php

namespace Modules\PlanFormation\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\PlanFormation\Models\BriefProjet;
use Modules\PlanFormation\Models\Module;
use Modules\PlanFormation\Models\Formateur;
use Modules\PlanFormation\Models\Competence;

class DashboardController extends Controller
{
    public function index()
{
    $nbModules = Module::count();
    $nbFormateurs = Formateur::count();
    $nbCompetences = Competence::count();
    $nbBriefs = BriefProjet::count();

    $modulesAvecBriefCount = Module::withCount('briefProjets')->orderBy('brief_projets_count', 'desc')->limit(10)->get();
    $competencesParModule = Module::withCount('competences')->orderBy('competences_count', 'desc')->limit(8)->get();

    // En développement tu peux décommenter pour debuguer
    // dd($modulesAvecBriefCount, $competencesParModule);

    $chartData = [
        'modulesParBrief' => [
            'labels' => $modulesAvecBriefCount->pluck('nom')->toArray(),
            'data' => $modulesAvecBriefCount->pluck('brief_projets_count')->toArray()
        ],
        'competencesParModule' => [
            'labels' => $competencesParModule->pluck('nom')->toArray(),
            'data' => $competencesParModule->pluck('competences_count')->toArray()
        ],
    ];
    // dd($chartData);

    return view('PlanFormation::admin.dashboard', compact(
        'nbModules',
        'nbFormateurs',
        'nbCompetences',
        'nbBriefs',
        'chartData'
    ));
}



public function getChartData($type)
{
    return response()->json(['message' => 'OK']);
}


}
