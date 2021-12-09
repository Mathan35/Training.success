<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentSubmit extends Model
{
    use HasFactory;


               /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'assignment_id',
        'submit_date',
        'submit_time',
        'status',
        'github_url',
        'output_url',
    ];

    public function getAssignment(){
        return $this->belongsTo(Assignment::class,'assignment_id', 'id');
    }

    public function getUser(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
