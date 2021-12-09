<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MockExamScore extends Model
{
    use HasFactory;


               /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'mock_exam_id',
        'score',
    ];

    public function getMockExam(){
        return $this->belongsTo(MockExam::class,'mock_exam_id', 'id');
    }

}
