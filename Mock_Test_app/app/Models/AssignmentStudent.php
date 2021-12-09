<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentStudent extends Model
{
    use HasFactory;

                /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'assignment_id',
        'user_id',
     
    ];

    public function getAssignment(){
        return $this->belongsTo(Assignment::class,'assignment_id', 'id');
    }

    public function getUser(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function getSubmittedAssignment(){
        return $this->belongsTo(AssignmentSubmit::class,'user_id', 'user_id');
    }
}
