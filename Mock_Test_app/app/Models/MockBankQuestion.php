<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MockBankQuestion extends Model
{
    use HasFactory;

            /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'question',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'correct_answer',
        'mock_bank_id',
    ];

    public function getMockBank(){
        return $this->belongsTo(MockBank::class,'mock_bank_id', 'id');
    }
    public function getMockBankExam(){
        return $this->belongsTo(MockExam::class,'mock_bank_id', 'mock_bank_id');
    }

}
