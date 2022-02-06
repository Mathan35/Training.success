<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
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

     // polymorpic one to many
     public function comments(){

        return $this->morphMany(Comment::class,'commentable');
    }


  

    // polymorpic many to many
    public function tags(){

        return $this->morphToMany(Tag::class,'tagable')->withTimestamps();
    }
}
