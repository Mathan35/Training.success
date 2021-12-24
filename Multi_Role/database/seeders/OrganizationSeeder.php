<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organization;
class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organization::create([
            'name' => "internal",            
        ]);
    }
}
