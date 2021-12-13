<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MockExam extends Model
{
    use HasFactory;


            /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'mock_bank_id',
        'title',
        'exam_id',
        'image',
    ];


    public function getMockBank(){
        return $this->belongsTo(MockBank::class,'mock_bank_id', 'id');
    }
}
