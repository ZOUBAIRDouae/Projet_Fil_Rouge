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
        return Tag::create($data);
    }

    public function deleteBrief(string $id)
    {
        $tag = BriefProjet::findOrFail($id);
        $tag->delete();
    }
}
