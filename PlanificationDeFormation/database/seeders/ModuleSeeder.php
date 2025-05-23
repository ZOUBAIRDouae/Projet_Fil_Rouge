<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('modules')->insert([
            ['nom' => 'Laravel', 'description' => 'Framework PHP'],
            ['nom' => 'UX Design', 'description' => 'Introduction au design centré utilisateur'],
        ]);
    }
}
