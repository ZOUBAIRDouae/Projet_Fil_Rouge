<?php

namespace Modules\PlanFormation\App\Imports;

use Modules\PlanFormation\Models\PlanAnnuel;
use Modules\PlanFormation\Controller\PlanController;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class PlanImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (!isset($row['date_debut'], $row['date_fin'], $row['filiere'], $row['formateur_id'])) {
            return null; // ignore la ligne invalide
        }
    
        return new Article([
            'date_debut' => $row['date_debut'],
            'date_fin' => $row['date_fin'],
            'filiere' => $row['filiere'],
            'formateur_id' => (int) $row['formateur_id'],
        ]);
    }
}

