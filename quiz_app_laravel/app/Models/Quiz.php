<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

         /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'image',
        'description',
    ];

    public function getTechnologyDetails(){
        return $this->hasOne('App\Models\QuizesTechnology','technology_id', 'id');
    }


    public function getQuizDetails(){
        return $this->hasOne('App\Models\QuizesTechnology','quiz_id', 'id');
    }


}
