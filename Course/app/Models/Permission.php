<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

       /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'permission_group_id',
     
    ];
    public function PermissionGroup()
    {
        return $this->hasOne(PermissionGroup::class,'id','permission_group_id');
    }
}
