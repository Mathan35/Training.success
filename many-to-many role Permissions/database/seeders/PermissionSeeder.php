<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            [
                'name' => "create post",
            ],
            [
                'name' => "delete post",
            ],
            [
                'name' => "edit post",
            ],
            [
                'name' => "update post",
            ],
            [
                'name' => "destroy post",
            ],
        ]);
    }
}
