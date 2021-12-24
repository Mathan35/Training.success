<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
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
        'workspace_id',
        'project_id',
    ];


    public function project(){
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
