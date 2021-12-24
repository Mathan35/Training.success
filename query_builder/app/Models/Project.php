<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
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
        'organization_id',
        'workspace_id',
    ];

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function organization(){
        return $this->hasOne(Organization::class, 'id', 'organization_id');
    }

    public function workspace(){
        return $this->hasOne(Workspace::class, 'id', 'workspace_id');
    }
}

