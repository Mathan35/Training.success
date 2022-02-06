<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;


       /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
    ];


    // polymorpic many to many
    public function posts(){

        return $this->morphedByMany(Post::class,'tagable');
    }

    // polymorpic many to many
    public function videos(){

        return $this->morphedByMany(Video::class,'tagable');
    }

}
