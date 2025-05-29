<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seance;
use App\Models\BriefProjet;
use App\Models\Module;
use App\Models\Formateur;
use App\Models\Competence;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $nbModules = Module::count();
        $nbFormateurs = Formateur::count();
        $nbCompetences = Competence::count();

        // Récupérer les 3 prochaines séances (par date)
        $prochainesSeances = Seance::where('heure_debut', '>=', now())
            ->orderBy('heure_debut')
            ->limit(3)
            ->get();

        return view('admin.dashboard', compact(
            'nbModules',
            'nbFormateurs',
            'nbCompetences',
            'prochainesSeances'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
