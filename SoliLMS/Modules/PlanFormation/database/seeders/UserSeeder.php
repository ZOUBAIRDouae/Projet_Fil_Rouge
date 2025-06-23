<?php

namespace Modules\PlanFormation\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\PlanFormation\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $responsable = User::create([
            'name' => 'Responsable Formation',
            'email' => 'responsable@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $responsable->assignRole('responsable');

        $apprenant = User::create([
            'name' => 'Apprenant 1',
            'email' => 'apprenant1@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $apprenant->assignRole('apprenant');

        $formateur = User::create([
            'name' => 'Formateur 1',
            'email' => 'formateur1@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $formateur->assignRole('formateur');

        $user = User::create([
            'name' => 'Responsable',
            'email' => 'responsable@solicode.com',
            'password' => bcrypt('formateur')]);
            
        $role = Role::findByName('admin', 'web');   
        $user->assignRole('responsable');
    }
    

    
}
