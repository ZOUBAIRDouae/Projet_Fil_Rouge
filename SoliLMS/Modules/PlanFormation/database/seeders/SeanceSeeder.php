<?php

namespace Modules\PlanFormation\database\seeders;

use Illuminate\Database\Seeder;
use Modules\PlanFormation\Models\Seance;
use Modules\PlanFormation\Models\PlanAnnuel;
use Modules\PlanFormation\Models\Module;
use Modules\PlanFormation\Models\Formateur;

class SeanceSeeder extends Seeder
{
    public function run(): void
    {
        $plans = PlanAnnuel::all();
        $modules = Module::all();
        $formateurs = Formateur::all();

        foreach ($plans as $plan) {
            foreach ($modules as $mod) {
                Seance::create([
                    'heure_debut'   => now()->startOfWeek()->addDay()->toDateString(),
                    'heure_fin'     => now()->startOfWeek()->addDay()->toDateString(),
                    'num_semaine'   => 1,
                    'plan_annuel_id'=> $plan->id,
                    'formateur_id'  => $formateurs->random()->id,
                    'module_id'     => $mod->id,
                ]);
            }
        }
    }
}