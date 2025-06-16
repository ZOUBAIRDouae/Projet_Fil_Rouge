<?php

namespace Modules\PlanFormation\Services;

use Modules\PlanFormation\Models\PlanAnnuel;
use Modules\PlanFormation\Models\BriefProjet;

class BriefProjetService
{
    public function getBriefs(string $search = null, int $perPage = 5)
    {
        $query = BriefProjet::query();
        if (!empty($search)) {
            $query->where('titre', 'like', '%' . $search . '%');
        }
        return $query->paginate($perPage);
    }

    public function createBrief(array $data)
    {
        $data['module_id'] = $data['module'];
        unset($data['module']);
        return BriefProjet::create($data);
        
    }

    public function deleteBrief(string $id)
    {
        $brief = BriefProjet::findOrFail($id);
        $brief->delete();
    }
}
