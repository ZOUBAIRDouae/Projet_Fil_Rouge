<?php

namespace Modules\PlanFormation\database\seeders;

use Illuminate\Database\Seeder;
use Modules\PlanFormation\Models\Module;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
        $modules = [
            ['nom'=>'Module A', 'description'=>'Intro to topic A'],
            ['nom'=>'Module B', 'description'=>'Deep dive into B'],
            ['nom'=>'Module C', 'description'=>'Advanced C techniques'],
        ];

        foreach ($modules as $data) {
            Module::create($data);
        }
    }
}