<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RolePermission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolePermission::insert([
            //admin 
            ['role_id' => 1, 'user_id' => 1, 'Organization_id' => 1, 'permission_id' =>1,    ],         
            ['role_id' => 1, 'user_id' => 1, 'Organization_id' => 1, 'permission_id' =>2,    ],         
            ['role_id' => 1, 'user_id' => 1, 'Organization_id' => 1, 'permission_id' =>3,    ],         
            ['role_id' => 1, 'user_id' => 1, 'Organization_id' => 1, 'permission_id' =>4,    ],         
            ['role_id' => 1, 'user_id' => 1, 'Organization_id' => 1, 'permission_id' =>5,    ],         
            ['role_id' => 1, 'user_id' => 1, 'Organization_id' => 1, 'permission_id' =>6,    ],         

            //organization admin 2
            ['role_id' => 2, 'user_id' => 2, 'Organization_id' => 2, 'permission_id' =>1,    ],         
            ['role_id' => 2, 'user_id' => 2, 'Organization_id' => 2, 'permission_id' =>2,    ],         
            ['role_id' => 2, 'user_id' => 2, 'Organization_id' => 2, 'permission_id' =>3,    ],         

            //organization admin 3
            ['role_id' => 2, 'user_id' => 8, 'Organization_id' => 3, 'permission_id' =>1,    ],         
            ['role_id' => 2, 'user_id' => 8, 'Organization_id' => 3, 'permission_id' =>2,    ],         
            ['role_id' => 2, 'user_id' => 8, 'Organization_id' => 3, 'permission_id' =>3,    ],         

            //organization admin 4
            ['role_id' => 2, 'user_id' => 14, 'Organization_id' => 4, 'permission_id' =>1,    ],         
            ['role_id' => 2, 'user_id' => 14, 'Organization_id' => 4, 'permission_id' =>2,    ],         
            ['role_id' => 2, 'user_id' => 14, 'Organization_id' => 4, 'permission_id' =>3,    ],         

            //organizatiom users 2
            ['role_id' => 3, 'user_id' => 3, 'Organization_id' => 2, 'permission_id' =>1,    ],         
            ['role_id' => 3, 'user_id' => 3, 'Organization_id' => 2, 'permission_id' =>2,    ],
            
            ['role_id' => 4, 'user_id' => 4, 'Organization_id' => 2, 'permission_id' =>1,    ],         
            ['role_id' => 4, 'user_id' => 4, 'Organization_id' => 2, 'permission_id' =>2,    ],

            ['role_id' => 5, 'user_id' => 5, 'Organization_id' => 2, 'permission_id' =>1,    ],         
            ['role_id' => 5, 'user_id' => 5, 'Organization_id' => 2, 'permission_id' =>2,    ],

            ['role_id' => 6, 'user_id' => 6, 'Organization_id' => 2, 'permission_id' =>1,    ],         
            ['role_id' => 6, 'user_id' => 6, 'Organization_id' => 2, 'permission_id' =>2,    ],

            ['role_id' => 7, 'user_id' => 7, 'Organization_id' => 2, 'permission_id' =>1,    ],         
            ['role_id' => 7, 'user_id' => 7, 'Organization_id' => 2, 'permission_id' =>2,    ],

            //organizatiom users 3
            ['role_id' => 8, 'user_id' => 9, 'Organization_id' => 3, 'permission_id' =>1,    ],         
            ['role_id' => 8, 'user_id' => 9, 'Organization_id' => 3, 'permission_id' =>2,    ],
            
            ['role_id' => 9, 'user_id' => 10, 'Organization_id' => 3, 'permission_id' =>1,    ],         
            ['role_id' => 9, 'user_id' => 10, 'Organization_id' => 3, 'permission_id' =>2,    ],

            ['role_id' => 10, 'user_id' => 11, 'Organization_id' => 3, 'permission_id' =>1,    ],         
            ['role_id' => 10, 'user_id' => 11, 'Organization_id' => 3, 'permission_id' =>2,    ],

            ['role_id' => 11, 'user_id' => 12, 'Organization_id' => 3, 'permission_id' =>1,    ],         
            ['role_id' => 11, 'user_id' => 12, 'Organization_id' => 3, 'permission_id' =>2,    ],

            ['role_id' => 12, 'user_id' => 13, 'Organization_id' => 3, 'permission_id' =>1,    ],         
            ['role_id' => 12, 'user_id' => 13, 'Organization_id' => 3, 'permission_id' =>2,    ],

            //organizatiom users 4
            ['role_id' => 13, 'user_id' => 15, 'Organization_id' => 4, 'permission_id' =>1,    ],         
            ['role_id' => 13, 'user_id' => 15, 'Organization_id' => 4, 'permission_id' =>2,    ],
            
            ['role_id' => 14, 'user_id' => 16, 'Organization_id' => 4, 'permission_id' =>1,    ],         
            ['role_id' => 14, 'user_id' => 16, 'Organization_id' => 4, 'permission_id' =>2,    ],

            ['role_id' => 15, 'user_id' => 17, 'Organization_id' => 4, 'permission_id' =>1,    ],         
            ['role_id' => 15, 'user_id' => 17, 'Organization_id' => 4, 'permission_id' =>2,    ],

            ['role_id' => 16, 'user_id' => 18, 'Organization_id' => 4, 'permission_id' =>1,    ],         
            ['role_id' => 16, 'user_id' => 18, 'Organization_id' => 4, 'permission_id' =>2,    ],

            ['role_id' => 17, 'user_id' => 19, 'Organization_id' => 4, 'permission_id' =>1,    ],         
            ['role_id' => 17, 'user_id' => 19, 'Organization_id' => 4, 'permission_id' =>2,    ],
      
         ]);
    }
}
