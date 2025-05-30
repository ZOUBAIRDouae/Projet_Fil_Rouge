<?php

namespace Database\Seeders;

use Modules\Blog\Models\User;
use Modules\Blog\database\seeders\DatabaseSeederBlog;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        $this->call([
            RoleSeeder::class,
            RolePermissionSeeder::class,
            DatabaseSeederBlog::class

        ]);
    }
}
