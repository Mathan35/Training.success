<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RolePermission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\RolePermission::factory(12)->create();
        $this->call([OrganizationSeeder::class,AdminSeeder::class, RoleSeeder::class, PermissionSeeder::class]);

    }
}
