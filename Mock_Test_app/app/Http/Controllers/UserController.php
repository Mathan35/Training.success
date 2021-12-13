<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MockExam;
use App\Models\Assignment;
use App\Models\AssignmentStudent;
use App\Models\User;
use App\Models\AssignmentImage;
use App\Models\AssignmentSubmit;
use App\Models\MockBankQuestion;
use App\Models\MockExamScore;
use App\Models\UserPersonalSkill;
use App\Models\UserTechSkill;
use Carbon\Carbon;
use DB;

class UserController extends Controller
{

    public function Home(){
        $mock_exams =  DB::table('mock_exams')->get()->unique('title');
        return view('welcome', compact('mock_exams'));
    }
    
    public function dashboard(){
        if(auth()->user()->role == "admin"){
            return redirect()->route('admin-dashboard');
        }
        else{
            return view('dashboard');
        }
    }

    public function checkAssignments(){
        $get_assignment = AssignmentStudent::where('user_id',auth()->user()->id)->orderBy('id', 'DESC')->get();
        $get_assignment_status = AssignmentSubmit::where('user_id',auth()->user()->id)->orderBy('id', 'DESC')->get();

        return view('user.check-assignments', compact('get_assignment','get_assignment_status'));
    }
    public function submitAssignments(){
        $get_assignment = AssignmentStudent::where('user_id',auth()->user()->id)->get();
        return view('user.submit-assignments', compact('get_assignment'));
    }
    public function createSubmission(Request $request){
        $check_id = AssignmentSubmit::where('assignment_id',$request->assignment_id)
                                     ->where('user_id',auth()->user()->id)->count();
        if($check_id>0){
            return redirect()->back()->with('success','Your Already submitted this Assignment...');
        }
        else{
            $errors = [
                'assignment_id.required' => 'The assignment type field is required..',
                'github_url.required'    => 'The github url field is required..',
            ];

            $request->validate([
                'assignment_id'   => 'required', 
                'github_url'      => 'required', 
            ],$errors);

            $assignment_submit                 = new AssignmentSubmit;
            $assignment_submit->assignment_id  = $request->assignment_id;
            $assignment_submit->github_url     = $request->github_url;
            $assignment_submit->output_url     = $request->output_url;
            $assignment_submit->user_id        = auth()->user()->id;
            $assignment_submit->submit_date    = Carbon::today()->toDateString();
            $assignment_submit->submit_time    = Carbon::now()->toTimeString();
            $assignment_submit->status         = 0;
            $assignment_submit->save();
            return redirect()->back()->with('success','Assignment submitted..');
        }

    }

    public function viewQuestions($title){
        $get_bank_id = MockExam::where("title",$title)->get()->pluck('mock_bank_id');
        $get_Questions = MockBankQuestion::where('mock_bank_id',$get_bank_id)->get();
        dd($get_Questions);
        return view('user.view_questions', compact('get_Questions', 'get_test_name'));
    }

    public function validateAnswers(Request $request){
        $data = 0;
        foreach ($request->answer as $value) {
            $data += MockBankQuestion::where('id', $value['res'])->where('correct_answer',$value['opt'])->count();
        }
        
        $store_result               = new MockExamScore;
        $store_result->user_id      = auth()->user()->id;
        $store_result->mock_exam_id = $request->mock_exam_id;
        $store_result->score        = $data;
        $store_result->save();
        return view('user.test_result',['result'=> $data]);
    }

    public function testResult(){
        $test_result = MockExamScore::where('user_id',auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('user.check_test_scores', compact('test_result'));
    }

    public function profileDetails(){
        $getPesonalSkill       = UserPersonalSkill::where("user_id",auth()->user()->id)->get();
        $getTechSkill       = UserTechSkill::where("user_id",auth()->user()->id)->get();
        $getUserDetails = User::find(auth()->user()->id);
        return view('user.profile-details',compact('getUserDetails','getPesonalSkill','getTechSkill'));
    }
    public function createProfile(Request $request){
          
        $profile                = User::find(auth()->user()->id);
        $profile->instagram_url = $request->instagram_url;
        $profile->facebook_url  = $request->facebook_url;
        $profile->linkedin_url  = $request->linkedin_url;
        $profile->recovery_email  = $request->recovery_email;
        $profile->save();

        UserTechSkill::UpdateorCreate(
            ["user_id"=>auth()->user()->id],
            [
                'user_id'    => auth()->user()->id,
                'skill_name' => $request->personal_skills,

            ]);

        UserPersonalSkill::UpdateorCreate(
            ["user_id"=>auth()->user()->id],
            [
                'user_id'    => auth()->user()->id,
                'skill_name' => $request->personal_skills,

            ]);
            
        return redirect()->back()->with('success','Profile Succesfully Updated..');
    }
  

}