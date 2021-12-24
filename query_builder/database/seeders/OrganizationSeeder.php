<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App \Models\Organization;
class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organization::insert([
            ['name' => "Internal",     'status' => 1      ],         
            ['name' => "Success App",  'status' => 1      ],         
            ['name' => "Amazon",       'status' => 1      ],         
            ['name' => "Google",       'status' => 1      ],                              
      
         ]);
    }
}
