<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => "SuperAdmin",            'organization_id' => 1      ], 
            ['name' => "Organization Admin",    'organization_id' => 1      ], 

            ['name' => "Frontend Developer",    'organization_id' => 2      ],         
            ['name' => "Back End developer",    'organization_id' => 2      ],         
            ['name' => "Tester",                'organization_id' => 2      ],                              
            ['name' => "Fullstack Developer",   'organization_id' => 2      ],  
            ['name' => "Vue js Developer"   ,   'organization_id' => 2      ],  

            ['name' => "Frontend Developer",    'organization_id' => 3      ],         
            ['name' => "Back End developer",    'organization_id' => 3      ],         
            ['name' => "Tester",                'organization_id' => 3      ],                              
            ['name' => "Fullstack Developer",   'organization_id' => 3      ],  
            ['name' => "Vue js Developer"   ,   'organization_id' => 3      ],  

            ['name' => "Frontend Developer",    'organization_id' => 4      ],         
            ['name' => "Back End developer",    'organization_id' => 4      ],         
            ['name' => "Tester",                'organization_id' => 4      ],                              
            ['name' => "Fullstack Developer",   'organization_id' => 4      ],  
            ['name' => "Vue js Developer"   ,   'organization_id' => 4      ],  

         ]);
    }
}
