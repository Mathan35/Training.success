<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::insert([
            ['name' => "Authentication",        'status' => 1,    'project_id' => 1,     ],        
            ['name' => "Admin Module",          'status' => 1,    'project_id' => 1,     ],        
            ['name' => "Front end design",      'status' => 1,    'project_id' => 1,     ],        
            ['name' => "Back End Integration",  'status' => 1,    'project_id' => 1,     ],
            
            ['name' => "Role based Auth",       'status' => 1,    'project_id' => 2,     ],        
            ['name' => "User Module",           'status' => 1,    'project_id' => 2,     ],        
            ['name' => "Front end Integration", 'status' => 1,    'project_id' => 2,     ],        
            ['name' => "Back End Integration",  'status' => 1,    'project_id' => 2,     ],

            ['name' => "Authentication",        'status' => 1,    'project_id' => 3,     ],        
            ['name' => "Client  Module",        'status' => 1,    'project_id' => 3,     ],        
            ['name' => "UI design",             'status' => 1,    'project_id' => 3,     ],        
            ['name' => "Back End works",        'status' => 1,    'project_id' => 3,     ],

            ['name' => "Multi Authentication",  'status' => 1,    'project_id' => 4,     ],        
            ['name' => "Admin Module",          'status' => 1,    'project_id' => 4,     ],        
            ['name' => "UI and UX design",      'status' => 1,    'project_id' => 4,     ],        
            ['name' => "Back End Integration",  'status' => 1,    'project_id' => 4,     ],

            ['name' => "Authentication",        'status' => 1,    'project_id' => 5,     ],        
            ['name' => "Admin Page",            'status' => 1,    'project_id' => 5,     ],        
            ['name' => "Front end design",      'status' => 1,    'project_id' => 5,     ],        
            ['name' => "Back End Integration",  'status' => 1,    'project_id' => 5,     ],

            ['name' => "Role based Auth",       'status' => 1,    'project_id' => 6,     ],        
            ['name' => "Customer Module",       'status' => 1,    'project_id' => 6,     ],        
            ['name' => "Front end design",      'status' => 1,    'project_id' => 6,     ],        
            ['name' => "Back End Works",        'status' => 1,    'project_id' => 6,     ],
            
         ]);
    }
}
