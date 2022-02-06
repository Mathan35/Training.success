<?php

namespace App\Helpers;
use App\Models\Enquiry;
use App\Models\Course;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\GetData;
use Spatie\QueryBuilder\QueryBuilder;

trait GetData{


    public function getUser(){
        return response($this->id);
    }
}