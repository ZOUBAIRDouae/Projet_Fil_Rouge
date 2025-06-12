<?php

namespace Modules\PlanFormation\Controllers;

use Modules\PlanFormation\Services\ModuleService;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ModuleController extends Controller
{
    protected $moduleService;

    public function __construct(ModuleService $moduleService)
    {
        $this->moduleService = $moduleService;
    }

    public function index(Request $request)
    {
        $modules = $this->moduleService->getModules($request);
        return view('PlanFormation::admin.module.index', compact('modules'));
    }

    public function create()
    {
        return view('PlanFormation::admin.module.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $this->moduleService->createModule($request->all());
        return redirect()->route('modules.index')->with('success', 'Module créée avec succès');
    }

    public function destroy(string $id)
    {
        $this->moduleService->deleteModule($id);
        return redirect()->route('modules.index')->with('success', 'Module supprimée avec succès');
    }
}
