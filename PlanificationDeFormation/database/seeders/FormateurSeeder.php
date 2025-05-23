<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Formateur;

class FormateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('formateurs')->insert([
            ['nom' => 'IMANE', 'prenom' => 'imane', 'email' => 'jean@example.com', 'telephone' => '0612345678', 'motDePasse' => bcrypt('secret')],
            ['nom' => 'ESSARRAJ', 'prenom' => 'Fouad', 'email' => 'claire@example.com', 'telephone' => '0698765432', 'motDePasse' => bcrypt('secret')],
        ]);
    }
}
