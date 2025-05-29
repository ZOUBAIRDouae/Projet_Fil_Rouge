<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  
use App\Models\Formateur;

class FormateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('formateurs')->insert([
            ['nom' => 'BOUZIANE', 'prenom' => 'imane', 'email' => 'imane@gmail.com', 'telephone' => '0612345678', 'motDePasse' => bcrypt('formateur')],
            ['nom' => 'ESSARRAJ', 'prenom' => 'Fouad', 'email' => 'fouad@gmail.com', 'telephone' => '0698765432', 'motDePasse' => bcrypt('formateur')],
            ['nom' => 'CHEBAB', 'prenom' => 'Fatin', 'email' => 'fatin@gmail.com', 'telephone' => '0698765432', 'motDePasse' => bcrypt('formateur')],
            ['nom' => 'SOKLABI', 'prenom' => 'Abdellatif', 'email' => 'soklabi@gmail.com', 'telephone' => '0698765432', 'motDePasse' => bcrypt('formateur')],
            ['nom' => 'EL MASOUDI', 'prenom' => 'Masoudi', 'email' => 'masoudi@gmail.com', 'telephone' => '0698765432', 'motDePasse' => bcrypt('formateur')],
        ]);
    }
}
