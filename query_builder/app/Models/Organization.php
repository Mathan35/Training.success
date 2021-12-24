<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'status',

    ];

    public function workspaces(){
        return $this->hasMany(Workspace::class);
    }
    public function projects(){
        return $this->hasMany(Project::class);
    }
    public function roles(){
        return $this->hasMany(Role::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
