<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizesTechnology extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'quiz_id',
        'technology_id',
    ];

    public function getQuiz(){
        return $this->belongsTo(Quiz::class,'quiz_id', 'id');
    }

    public function getTechnology(){
        return $this->belongsTo(Technology::class,'technology_id', 'id');
    }
}
