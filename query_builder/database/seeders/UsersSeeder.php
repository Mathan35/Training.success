<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
            'name' => "Admin",     
            'email' => "admin@gmail.com",
            'organization_id' => 1,
            'password'   => Hash::make('10101010'),       
            ],
            

            //organization 2
            [
            'name' => "Success",     
            'email' => "success@gmail.com",
            'organization_id' => 2,
            'password'   => Hash::make('10101010'),       
            ],
            [
            'name' => "retson",     
            'email' => "retson@gmail.com",
            'organization_id' => 2,
            'password'   => Hash::make('10101010'),       
            ],

            [
            'name' => "mathankumar",     
            'email' => "mathan@gmail.com",
            'organization_id' => 2,
            'password'   => Hash::make('10101010'),       
            ],

            [
            'name' => "kumar",     
            'email' => "kumar@gmail.com",
            'organization_id' => 2,
            'password'   => Hash::make('10101010'),       
            ],

            [
            'name' => "sudhakar",     
            'email' => "sudhakar@gmail.com",
            'organization_id' => 2,
            'password'   => Hash::make('10101010'),       
            ],

            [
            'name' => "raj",     
            'email' => "raj@gmail.com",
            'organization_id' => 2,
            'password'   => Hash::make('10101010'),       
            ],

             //organization 3
            [
            'name' => "Amazon",     
            'email' => "amazon@gmail.com",
            'organization_id' => 3,
            'password'   => Hash::make('10101010'),       
            ],
        
            [
            'name' => "ravikumar",     
            'email' => "ravi@gmail.com",
            'organization_id' => 3,
            'password'   => Hash::make('10101010'),       
            ],

            [
            'name' => "kavin",     
            'email' => "kavin@gmail.com",
            'organization_id' => 3,
            'password'   => Hash::make('10101010'),       
            ],

            [
            'name' => "chembiyan",     
            'email' => "chembiyan@gmail.com",
            'organization_id' => 3,
            'password'   => Hash::make('10101010'),       
            ],

            [
            'name' => "gopi",     
            'email' => "gopi@gmail.com",
            'organization_id' => 3,
            'password'   => Hash::make('10101010'),       
            ],

            [
            'name' => "gopal",     
            'email' => "gopal@gmail.com",
            'organization_id' => 3,
            'password'   => Hash::make('10101010'),       
            ],


            //organization 3
            [
            'name' => "Google",     
            'email' => "google@gmail.com",
            'organization_id' => 4,
            'password'   => Hash::make('10101010'),       
            ],

            [
            'name' => "ramkumar",     
            'email' => "ram@gmail.com",
            'organization_id' => 4,
            'password'   => Hash::make('10101010'),       
            ],

            [
            'name' => "david",     
            'email' => "david@gmail.com",
            'organization_id' => 4,
            'password'   => Hash::make('10101010'),       
            ],

            [
            'name' => "muthraja",     
            'email' => "muthraja@gmail.com",
            'organization_id' => 4,
            'password'   => Hash::make('10101010'),       
            ],

            [
            'name' => "ishtakhar",     
            'email' => "ishtakhar@gmail.com",
            'organization_id' => 4,
            'password'   => Hash::make('10101010'),       
            ],

            [
            'name' => "meganathan",     
            'email' => "meganathan@gmail.com",
            'organization_id' => 4,
            'password'   => Hash::make('10101010'),       
            ],

        
            
            
                                      
      
         ]);
    }
}
