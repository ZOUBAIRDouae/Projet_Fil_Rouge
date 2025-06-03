<?php

namespace Modules\PlanFormation\Services;

use Modules\PlanFormation\Models\Module;
use Illuminate\Http\Request;

class ModuleService
{
    public function getModules(Request $request)
    {
        $query = Module::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        return $query->paginate(10);
    }

    public function createModule(array $data)
    {
        return Module::create([
            'nom' => $data['nom'],
            'description' => $data['description']
        ]);
    }

    public function deleteModule(string $id)
    {
        $module = Module::findOrFail($id);
        $module->delete();
    }
}
