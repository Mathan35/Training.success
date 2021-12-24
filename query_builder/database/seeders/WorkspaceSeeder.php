<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Workspace;
class WorkspaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Workspace::insert([
            ['name' => "Success workspace 1",     'organization_id' => 2      ],         
            ['name' => "Success workspace 2",     'organization_id' => 2      ],         
            
            ['name' => "Amazon workspace 1",     'organization_id' => 3       ],         
            ['name' => "Amazon workspace 2",     'organization_id' => 3       ],         

            ['name' => "Google workspace 1",     'organization_id' => 4       ],         
            ['name' => "Google workspace 2",     'organization_id' => 4       ],         
      
         ]);
    }
}
