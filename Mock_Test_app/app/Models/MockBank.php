<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MockBank extends Model
{
    use HasFactory;

            /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'technology_id',
        'title',
        'image',
        'description',
        'video_url',
        'status',
    ];

    public function getTechnology(){
        return $this->belongsTo(Technology::class,'technology_id', 'id');
    }


}
