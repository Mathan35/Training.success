<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagBank extends Model
{
    use HasFactory;


            /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'tag_id',
        'bank_id',
    ];


    public function getMockBank(){
        return $this->belongsTo(MockBank::class,'bank_id', 'id');
    }

    
    public function getTag(){
        return $this->belongsTo(Tag::class,'tag_id', 'id');
    }
}
