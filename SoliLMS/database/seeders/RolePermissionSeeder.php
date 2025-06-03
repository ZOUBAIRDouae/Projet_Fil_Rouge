<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // $admin = Role::where(['name' => 'admin'])->first();

        // Permission::create(['name' => 'edit']);
        // Permission::create(['name' => 'view public']);
        // $admin->givePermissionTo('edit');

        // Permission::firstOrCreate(['name' => 'supprimer']);
        
        // Role::findByName('admin')->givePermissionTo('edit');
        // Role::findByName('admin')->givePermissionTo('supprimer');
        // Role::findByName('user')->givePermissionTo(['view public']);

                // Créer les rôles
                $responsable = Role::firstOrCreate(['name' => 'responsable']);
                $apprenant = Role::firstOrCreate(['name' => 'apprenant']);
                $formateur = Role::firstOrCreate(['name' => 'formateur']);
        
                // Créer les permissions
                $voirPlan = Permission::firstOrCreate(['name' => 'voir plan']);
                $consulterDashboard = Permission::firstOrCreate(['name' => 'consulter tableau bord']);
                $ajouterPlan = Permission::firstOrCreate(['name' => 'ajouter plan']);
                $modifierPlan = Permission::firstOrCreate(['name' => 'modifier plan']);
                $supprimerPlan = Permission::firstOrCreate(['name' => 'supprimer plan']);
        
                // Donner les permissions
                $responsable->givePermissionTo(['voir plan', 'consulter tableau bord']);
                $apprenant->givePermissionTo(['voir plan']);
                $formateur->givePermissionTo([
                    'voir plan',
                    'consulter tableau bord',
                    'ajouter plan',
                    'modifier plan',
                    'supprimer plan'
                ]);
            







        




       
    }
}