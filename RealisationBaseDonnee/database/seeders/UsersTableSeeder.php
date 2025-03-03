<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    public function run(): void
    {
        $users = [
            [
                'name' => 'HAMMOUDA',
                'email' => 'responsable@gmail.com',
                'password' => Hash::make('responsable'),
                'role' => 'responsable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'ESSARRAJ Fouad',
                'email' => 'formateur@gmail.com',
                'password' => Hash::make('formateur'),
                'role' => 'formateur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
    }
}
