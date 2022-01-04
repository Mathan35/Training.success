<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Course;
use App\Models\Country;
use App\Models\Degree;
use App\Models\College;
use App\Models\Specializtion;
use App\Models\UserUgDegree;
use App\Models\UserPgDegree;
use App\Models\Enquiry;
use App\Http\Requests\EducationRequest;
use Carbon\Carbon;
use App\Helpers\General;

class HomeController extends Controller
{

    use General;

    public function Dashboard(){
        return view('dashboard');
    }
    public function test(){
        return view('test');
    }
    public function Index(){
        $Course      = QueryBuilder::for(Course::class)->get();
        return view('welcome', compact('Course'));
    }
    public function register(){
        $Country      = QueryBuilder::for(Country::class)->get();
        return view('auth.register', compact('Country'));
    }
    public function EducationDetail(){
        $GetEducation   = QueryBuilder::for(UserUgDegree::class)->where('user_id',auth()->user()->id)->first();
        $GetPgEducation = QueryBuilder::for(UserPgDegree::class)->where('user_id',auth()->user()->id)->first();
        return view('education-detail', compact('GetEducation','GetPgEducation'));
    }
    public function ViewCourse($id){
        $Course        = QueryBuilder::for(Course::class)->find($id);
        $CheckEnquiry  = $this->CheckUser($id);
        return view('view-course', compact('Course','CheckEnquiry'));
    }

    public function Enquiry(Request $request, $id){
    
        $Enquiry             = new Enquiry;
        $Enquiry->user_id    = auth()->user()->id;
        $Enquiry->course_id  = $id;
        $Enquiry->status     = 0;
        $Enquiry->date       = Carbon::today()->toDateString();
        $Enquiry->time       = Carbon::now()->toTimeString();
        $Enquiry->enquiry_id = $this->EnquiryId();
        $Enquiry->save();
        return redirect()->back()->with('success', 'Enquiry Submitted successfully');
      
    }
    public function ViewEnquiry(){
        $EnquiryCourses    = QueryBuilder::for(Enquiry::class)->where('user_id',auth()->user()->id)->get();
        return view('view-enquiry', compact('EnquiryCourses'));
    }

   
}
