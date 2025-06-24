<?php

namespace Modules\PlanFormation\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\PlanFormation\Models\BriefProjet;
use Modules\PlanFormation\Models\Module;
use Modules\PlanFormation\Models\Formateur;
use Modules\PlanFormation\Models\Competence;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $nbModules = Module::count();
        $nbFormateurs = Formateur::count();
        $nbCompetences = Competence::count();
        $nbBriefs = BriefProjet::count();


        $modulesAvecBriefCount = Module::withCount('briefProjets')
            ->orderBy('brief_projets_count', 'desc')
            ->limit(10)
            ->get();


        $competencesParModule = Module::withCount('competences')
            ->orderBy('competences_count', 'desc')
            ->limit(8)
            ->get();

        
        $briefsParStatut = BriefProjet::select('statut', DB::raw('count(*) as total'))
            ->groupBy('statut')
            ->get();

        // Monthly growth data (last 6 months)
        $monthlyGrowth = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthlyGrowth[] = [
                'month' => $date->format('M'),
                'modules' => Module::whereMonth('created_at', $date->month)
                    ->whereYear('created_at', $date->year)
                    ->count(),
                'briefs' => BriefProjet::whereMonth('created_at', $date->month)
                    ->whereYear('created_at', $date->year)
                    ->count(),
                'competences' => Competence::whereMonth('created_at', $date->month)
                    ->whereYear('created_at', $date->year)
                    ->count(),
                'formateurs' => Formateur::whereMonth('created_at', $date->month)
                    ->whereYear('created_at', $date->year)
                    ->count(),
            ];
        }

        // Top modules by competences
        $topModulesCompetences = Module::withCount('competences')
            ->having('competences_count', '>', 0)
            ->orderBy('competences_count', 'desc')
            ->limit(5)
            ->get();

        // Prepare all chart data
        $chartData = [
            'modulesParBrief' => [
                'labels' => $modulesAvecBriefCount->pluck('nom')->toArray(),
                'data' => $modulesAvecBriefCount->pluck('brief_projets_count')->toArray()
            ],
            'competencesParModule' => [
                'labels' => $competencesParModule->pluck('nom')->toArray(),
                'data' => $competencesParModule->pluck('competences_count')->toArray()
            ],
            'briefsParStatut' => [
                'labels' => $briefsParStatut->pluck('statut')->toArray(),
                'data' => $briefsParStatut->pluck('total')->toArray()
            ],
            'monthlyGrowth' => $monthlyGrowth,
            'topModulesCompetences' => [
                'labels' => $topModulesCompetences->pluck('nom')->toArray(),
                'data' => $topModulesCompetences->pluck('competences_count')->toArray()
            ]
        ];

        return view('PlanFormation::admin.dashboard', compact(
            'nbModules',
            'nbFormateurs',
            'nbCompetences',
            'nbBriefs',
            'chartData'
        ));
    }

    public function show($id)
    {
       
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }
}