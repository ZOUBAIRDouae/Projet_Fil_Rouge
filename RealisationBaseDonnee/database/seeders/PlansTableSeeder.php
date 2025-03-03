<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansTableSeeder extends Seeder
{

    public function run(): void
    {
       $plans = [
            [
                'titre' => 'Plan de Formation Développement Web',
                'description' => 'Ce plan couvre les modules essentiels pour devenir développeur web.',
                'user_id' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                'titre' => 'Plan de Formation Développement Mobile',
                'description' => 'Ce plan couvre les modules essentiels pour devenir développeur mobile.',
                'user_id' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
    }
}
