<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::insert([
            ['name' => "Success Project 1",    'status' => 1,    'workspace_id' => 1,   'organization_id' => 2      ],         
            ['name' => "Success Project 2",    'status' => 1,    'workspace_id' => 2,   'organization_id' => 2      ],  
            
            ['name' => "Amazon Project 1",     'status' => 1,    'workspace_id' => 3,   'organization_id' => 3      ],         
            ['name' => "Amazon Project 2",     'status' => 1,    'workspace_id' => 4,   'organization_id' => 3      ],  

            ['name' => "Google Project 1",     'status' => 1,    'workspace_id' => 5,   'organization_id' => 4      ],         
            ['name' => "Google Project 2",     'status' => 1,    'workspace_id' => 6,   'organization_id' => 4      ],  
                  
         ]);
    }
}
