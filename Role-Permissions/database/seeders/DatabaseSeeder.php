<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\RolePermission::factory(5)->create();
        $this->call([AdminRoleSeeder::class,AdminSeeder::class, RoleSeeder::class, PermissionSeeder::class]);
    }
}
