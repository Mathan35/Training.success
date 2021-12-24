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
     public function getPermissions()
     {
         return $this->belongsToMany(Permission::class, 'role_permissions')
                     ->wherePivot('organization_id',1)->wherePivot('user_id',1)->withTimestamps();
     }
       //for roles to permissio
       public function getOrganizationPermissions()
       {
           return $this->belongsToMany(Permission::class, 'role_permissions')
                       ->wherePivot('organization_id',auth()->user()->organization_id)->wherePivot('user_id',auth()->user()->id)->withTimestamps();
       }

}
