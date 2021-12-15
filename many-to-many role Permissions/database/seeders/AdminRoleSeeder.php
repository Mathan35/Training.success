<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'user_id' => "1",
            'role_id' => "1",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
