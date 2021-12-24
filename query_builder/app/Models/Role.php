<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'organization_id',
    ];

       //for roles to permissio
       public function permissions()
       {
           return $this->belongsToMany(Permission::class, 'role_permissions')->withTimestamps();
       }

        //for roles to permissio
        public function organizations()
        {
            return $this->hasOne(Organization::class, 'id', 'organization_id');
        }
   
}
