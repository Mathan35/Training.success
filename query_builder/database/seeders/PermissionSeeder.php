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
            ['name' => "view organization",      ],         
            ['name' => "view role",              ],         
            ['name' => "view workspace",         ],         
            ['name' => "view projects",          ],                              
            ['name' => "view task",              ],                              
            ['name' => "view users",             ],                              
      
         ]);
    }
}
