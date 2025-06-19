<?php

namespace Modules\PlanFormation\database\seeders;

use Illuminate\Database\Seeder;
use Modules\PlanFormation\Models\PlanAnnuel;
use Modules\PlanFormation\Models\Formateur;

class PlanAnnuelSeeder extends Seeder
{
    public function run(): void
    {
        $formateur = Formateur::first();

        if (! $formateur) {
            throw new \Exception('Aucun formateur trouvé dans la table formateurs');
        }

        $planData = [
            ['date_debut'=>'2025-01-01','date_fin'=>'2025-12-31','filiere'=>'DWB', 'formateur_id'=>$formateur->id],
            ['date_debut'=>'2025-02-01','date_fin'=>'2025-11-30','filiere'=>'DMB', 'formateur_id'=>$formateur->id],
        ];

        foreach ($planData as $row) {
            PlanAnnuel::create($row);
        }
    }
}
