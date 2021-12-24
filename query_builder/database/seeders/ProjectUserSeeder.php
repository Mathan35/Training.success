<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectUser;
class ProjectUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectUser::insert([
            //organization 2,workspace 1 & 2, project 1 & 2
            ['user_id' => 3,   'project_id' => 1,   'organization_id' => 2,   'workspace_id' => 1,     ], 
            ['user_id' => 4,   'project_id' => 1,   'organization_id' => 2,   'workspace_id' => 1,     ], 
            ['user_id' => 5,   'project_id' => 1,   'organization_id' => 2,   'workspace_id' => 1,     ], 
            ['user_id' => 6,   'project_id' => 1,   'organization_id' => 2,   'workspace_id' => 1,     ],         
            ['user_id' => 7,   'project_id' => 1,   'organization_id' => 2,   'workspace_id' => 1,     ], 

            ['user_id' => 3,   'project_id' => 2,   'organization_id' => 2,   'workspace_id' => 2,     ], 
            ['user_id' => 4,   'project_id' => 2,   'organization_id' => 2,   'workspace_id' => 2,     ], 
            ['user_id' => 5,   'project_id' => 2,   'organization_id' => 2,   'workspace_id' => 2,     ], 
            ['user_id' => 6,   'project_id' => 2,   'organization_id' => 2,   'workspace_id' => 2,     ],         
            ['user_id' => 7,   'project_id' => 2,   'organization_id' => 2,   'workspace_id' => 2,     ], 

            //organization 3,workspace 3 & 4, project 3 & 4
            ['user_id' => 9,    'project_id' => 3,   'organization_id' => 3,   'workspace_id' => 3,    ], 
            ['user_id' => 10,   'project_id' => 3,   'organization_id' => 3,   'workspace_id' => 3,    ], 
            ['user_id' => 11,   'project_id' => 3,   'organization_id' => 3,   'workspace_id' => 3,    ], 
            ['user_id' => 12,   'project_id' => 3,   'organization_id' => 3,   'workspace_id' => 3,    ],         
            ['user_id' => 13,   'project_id' => 3,   'organization_id' => 3,   'workspace_id' => 3,    ], 

            ['user_id' => 9,    'project_id' => 4,   'organization_id' => 3,   'workspace_id' => 4,    ], 
            ['user_id' => 10,   'project_id' => 4,   'organization_id' => 3,   'workspace_id' => 4,    ], 
            ['user_id' => 11,   'project_id' => 4,   'organization_id' => 3,   'workspace_id' => 4,    ], 
            ['user_id' => 12,   'project_id' => 4,   'organization_id' => 3,   'workspace_id' => 4,    ],         
            ['user_id' => 13,   'project_id' => 4,   'organization_id' => 3,   'workspace_id' => 4,    ], 

            //organization 4,workspace 5 & 6, project 5 & 6
            ['user_id' => 15,    'project_id' => 5,   'organization_id' => 4,   'workspace_id' => 5,   ], 
            ['user_id' => 16,   'project_id' => 5,   'organization_id' => 4,   'workspace_id' => 5,    ], 
            ['user_id' => 17,   'project_id' => 5,   'organization_id' => 4,   'workspace_id' => 5,    ], 
            ['user_id' => 18,   'project_id' => 5,   'organization_id' => 4,   'workspace_id' => 5,    ],         
            ['user_id' => 19,   'project_id' => 5,   'organization_id' => 4,   'workspace_id' => 5,    ], 

            ['user_id' => 15,    'project_id' => 6,   'organization_id' => 4,   'workspace_id' => 6,   ], 
            ['user_id' => 16,   'project_id' => 6,   'organization_id' => 4,   'workspace_id' => 6,    ], 
            ['user_id' => 17,   'project_id' => 6,   'organization_id' => 4,   'workspace_id' => 6,    ], 
            ['user_id' => 18,   'project_id' => 6,   'organization_id' => 4,   'workspace_id' => 6,    ],         
            ['user_id' => 19,   'project_id' => 6,   'organization_id' => 4,   'workspace_id' => 6,    ], 
            
         ]);
    }
}
