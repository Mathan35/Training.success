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
           ['name' => "create-role",'organization_id' => 1          ],         
           ['name' => "edit-role",'organization_id' => 1            ],         
           ['name' => "create-user",'organization_id' => 1          ],         
           ['name' => "create-internal-user",'organization_id' => 1 ],         
           ['name' => "edit-user",'organization_id' => 1            ],         
           ['name' => "edit-internal-user",'organization_id' => 1   ],         
           ['name' => "create-organization",'organization_id' => 1  ],         
           ['name' => "edit-organization",'organization_id' => 1    ],  
           ['name' => "view-organization",'organization_id' => 1    ],         
           ['name' => "view-role",'organization_id' => 1            ],   
           ['name' => "view-users",'organization_id' => 1          ],         
           ['name' => "view-internal-users",'organization_id' => 1            ],                      
     
        ]);
    }
}
