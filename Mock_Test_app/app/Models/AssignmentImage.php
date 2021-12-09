<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentImage extends Model
{
    use HasFactory;

            /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'assignment_id',
        'image',
     
    ];

    
    public function getAssignmentImages(){
        return $this->belongsTo(Assignment::class,'assignment_id', 'id');
    }
}
