<?php

namespace Modules\PlanFormation\Services;

use Modules\PlanFormation\Models\PlanAnnuel;

class BriefProjetService
{
    public function getBriefs(string $search = null, int $perPage = 10)
    {
        $query = BriefProjet::query();
        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        return $query->paginate($perPage);
    }

    public function createBrief(array $data)
    {
        return BriefProjet::create($data);
    }

    public function deleteBrief(string $id)
    {
        $brief = BriefProjet::findOrFail($id);
        $brief->delete();
    }
}
