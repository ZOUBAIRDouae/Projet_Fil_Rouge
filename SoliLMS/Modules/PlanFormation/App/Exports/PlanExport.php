<?php

namespace Modules\PlanFormation\App\Exports;

use Modules\PlanFormation\Models\PlanAnnuel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Carbon\Carbon;

class PlanExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    public function collection()
    {
        return PlanAnnuel::with(['modules', 'briefProjets', 'competences'])->get()->map(function ($plan) {
            return [
                'id'           => $plan->id,
                'date_debut'   => Carbon::parse($plan->date_debut)->format('d/m/Y'),
                'date_fin'     => Carbon::parse($plan->date_fin)->format('d/m/Y'),
                'filiere'      => $plan->filiere,
                'modules'      => $plan->modules->pluck('nom')->join(', '),
                'briefs'       => $plan->briefProjets->pluck('titre')->join(', '),
                'competences'  => $plan->competences->pluck('nom')->join(', '),
                'created_at'   => Carbon::parse($plan->created_at)->format('d/m/Y H:i'),
                'updated_at'   => Carbon::parse($plan->updated_at)->format('d/m/Y H:i'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Date de début',
            'Date de fin',
            'Filière',
            'Modules',
            'Briefs de projets',
            'Compétences',
            'Créé le',
            'Mis à jour le'
        ];
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
            'use_bom' => true, // Important pour Excel (accents corrects)
        ];
    }
}
