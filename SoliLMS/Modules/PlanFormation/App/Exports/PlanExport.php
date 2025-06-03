<?php

namespace Modules\PlanFormation\App\Exports;

use Modules\PlanFormation\Models\PlanAnnuel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\PlanFormation\Controllers\PlanController;

class PlanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return PlanAnnuel::with(['module', 'briefprojets', 'competences'])->get()->map(function ($plan) {
            return [
                'id' => $plan->id,
                'date_debut' => $plan->date_debut->format('Y-m-d'),
                'date_fin' => $plan->date_fin->format('Y-m-d'),
                'filiere' => $plan->filiere,
                'module_nom' => $plan->module->nom,
                'briefprojets' => $plan->briefprojets->pluck('titre')->join(', '),
                'competences' => $plan->competences->pluck('titre')->join(', '),
                'created_at' => $plan->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $plan->updated_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            // 'ID',
            // 'Date de début',
            // 'Date de fin',
            //'Filière',
            'Module',
            'Briefs de projets',
            'Compétences',
            'Created At',
            'Updated At'
        ];
    }
}
