<?php

namespace Modules\PlanFormation\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\PlanFormation\Models\BriefProjet;

class BriefProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('brief_projets')->insert([
            ['titre' => 'Projet Blog', 'description' => 'Créer un blog avec Laravel', 'statut' => 'en cours', 'module_id' => 1],
            ['titre' => 'Refonte site e-commerce', 'description' => 'Améliorer UX d’un site', 'statut' => 'terminé', 'module_id' => 2],
        ]);    
    }
}
