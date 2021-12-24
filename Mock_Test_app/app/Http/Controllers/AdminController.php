<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technology;
use App\Models\MockBank;
use App\Models\MockBankQuestion;
use App\Models\MockExam;
use App\Models\Tag;
use App\Models\TagBank;
use App\Models\Assignment;
use App\Models\AssignmentImage;
use App\Models\User;
use App\Models\AssignmentStudent;
use App\Models\AssignmentSubmit;
use App\Helpers\General;

class AdminController extends Controller
{
    use General;
    
    public function dashboard(){
        $user = User::where('role','user')->count();
        return view('admin.dashboard',compact('user'));
    }

    //technology
    public function Technology(){
        $technology = Technology::get();
        return view('admin.technology.technology', compact('technology'));
    }
    public function createTechnology(Request $request){
        $errors = [
            'name.required'   => 'The name field is required..',
            'image.required'  => 'The image field is required..',
        ];

        $request->validate([
            'name'   => 'required',
            'image'  => 'required',
        ],$errors);

        $technology              = new Technology;
        $image                   = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/images/'),$image);
        $technology->name        = $request->name;
        $technology->image       = $image;
        $technology->description = $request->description;   
        $technology->save();
        return redirect()->back()->with('success','technology successfully saved');

    }
    public function deleteTechnology($id){
        if($this->validateId($id,"technology_id","mock_banks") == true){
            return redirect()->back()->with('success','This Technology used in other table');
        }
        else{
            Technology::find($id)->delete();
            return redirect()->back()->with('success','Technology deleted successfully');
        }
    }
    public function editTechnology($id){
        $edit_technology = Technology::find($id);
        return view('admin.technology.edit_technology',['data' => $edit_technology]);
    }
    public function updateTechnology(Request  $request,$id){
        $errors = [
            'name.required'   => 'The name field is required..',
            'image.required'  => 'The image field is required..',
        ];

        $request->validate([
            'name'   => 'required',
            'image'  => 'required',
        ],$errors);

        $technology              = Technology::find($id);
        $image                   = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/images/'),$image);
        $technology->name        = $request->name;
        $technology->image       = $image;
        $technology->description = $request->description;   
        $technology->save();
        return redirect()->back()->with('success','technology successfully updated');
    }

    //mock banks
    public function mockBanks(){
        $mock_bank  = MockBank::with('getTechnology')->get();
        $technology = Technology::orderBy('id', 'DESC')->get();
        return view('admin.mock_bank.mock_bank' ,compact('mock_bank','technology'));
    }
    public function createMockBanks(Request $request){
        $errors = [
            'technology_id.required'  => 'The technology type field is required..',
            'title.required'          => 'The title field is required..',
            'image.required'          => 'The image field is required..',
            'description.required'    => 'The imdescriptionage field is required..',
            'video_url.required'      => 'The video_url field is required..',
            'status.required'         => 'The status field is required..',
        ];

        $request->validate([
            'title'          => 'required',
            'technology_id'  => 'required',
            'image'          => 'required',
            'description'    => 'required',
            'video_url'      => 'required',
            'status'         => 'required',
        ],$errors);

        $mock_bank                       = new MockBank;
        $image                           = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/images/'),$image);
        $mock_bank->technology_id        = $request->technology_id;
        $mock_bank->title                = $request->title;
        $mock_bank->image                = $image;
        $mock_bank->description          = $request->description;   
        $mock_bank->video_url            = $request->video_url;   
        $mock_bank->status               = $request->status;   
        $mock_bank->save();
        return redirect()->back()->with('success','Mock Bank successfully saved');
    }
    public function deleteMockBank($id){
        if($this->validateId($id,"mock_bank_id","mock_exams") == true 
        || $this->validateId($id,"mock_bank_id","mock_bank_questions") == true 
        || $this->validateId($id,"bank_id","tag_banks") == true ){

            return redirect()->back()->with('success','This Mock Bank used in other category');
        }
        else{
            MockBank::find($id)->delete();
            return redirect()->back()->with('success','Mock Bank deleted successfully');
        }
    }
    public function editMockBank($id){
        $mock_bank = MockBank::with('getTechnology')->find($id);
        $technology = Technology::orderBy('id', 'DESC')->get();
        return view('admin.mock_bank.edit_mock_bank',compact('technology','mock_bank'));
    }
    public function updateMockBank(Request  $request,$id){
        $errors = [
            'title.required'        => 'The title field is required..',
            'image.required'        => 'The image field is required..',
            'description.required'  => 'The imdescriptionage field is required..',
            'video_url.required'    => 'The video_url field is required..',
            'status.required'       => 'The status field is required..',
        ];

        $request->validate([
            'title'        => 'required',
            'image'        => 'required',
            'description'  => 'required',
            'video_url'    => 'required',
            'status'       => 'required',
        ],$errors);

        $mock_bank               = MockBank::find($id);
        $image                   = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/images/'),$image);
        $mock_bank->title        = $request->title;
        $mock_bank->image        = $image;
        $mock_bank->description  = $request->description;   
        $mock_bank->video_url    = $request->video_url;   
        $mock_bank->status       = $request->status;   
        $mock_bank->save();
        return redirect()->back()->with('success','Mock Bank successfully updated');
    }

    //mockBankQuestions
    public function mockBankQuestions(){
        $mock_bank = MockBank::orderBy('id', 'DESC')->get();
        $mock_bank_question = MockBankQuestion::with('getMockBank')->get();
        return view('admin.mock_bank_question.mock_bank_question', compact('mock_bank','mock_bank_question'));
    }
    public function createMockBanksQuestions(Request $request){
        $errors = [
            'question.required'        => 'The Question field is required..',
            'option_1.required'        => 'The Option_1 field is required..',
            'option_2.required'        => 'The Option_2 field is required..',
            'option_3.required'        => 'The Option_3 field is required..',
            'option_4.required'        => 'The Option_4 field is required..',
            'correct_answer.required'  => 'The Correct_answer field is required..',
            'mock_bank_id.required'    => 'The mock bank type field is required..',
        ];

        $request->validate([
            'question'        => 'required',
            'option_1'        => 'required',
            'option_2'        => 'required',
            'option_3'        => 'required',
            'option_4'        => 'required',
            'correct_answer'  => 'required',
            'mock_bank_id'    => 'required',
        ],$errors);

        $mock_bank_question                 = new MockBankQuestion;
        $mock_bank_question->question       = $request->question;
        $mock_bank_question->option_1       = $request->option_1;
        $mock_bank_question->option_2       = $request->option_2;
        $mock_bank_question->option_3       = $request->option_3;   
        $mock_bank_question->option_4       = $request->option_4;   
        $mock_bank_question->correct_answer = $request->correct_answer;   
        $mock_bank_question->mock_bank_id   = $request->mock_bank_id;   
        $mock_bank_question->save();
        return redirect()->back()->with('success','Mock Bank Question successfully saved');
    }
    public function deleteMockBankQuestions($id){
        MockBankQuestion::find($id)->delete();
        return redirect()->back()->with('success','Mock Bank Question deleted successfully');
    }
    public function editMockBankQuestions($id){

        $mock_bank          = MockBank::orderBy('id', 'DESC')->get();
        $mock_bank_question = MockBankQuestion::with('getMockBank')->find($id);
        return view('admin.mock_bank_question.edit_mock_bank_question',['mock_data' => $mock_bank_question],compact('mock_bank'));
    }
    public function updateMockBankQuestions(Request $request, $id){
        $errors = [
            'question.required'        => 'The technology type field is required..',
            'option_1.required'        => 'The option_1 field is required..',
            'option_2.required'        => 'The option_2 field is required..',
            'option_3.required'        => 'The option_3 field is required..',
            'option_4.required'        => 'The option_4 field is required..',
            'correct_answer.required'  => 'The correct_answer field is required..',
            'mock_bank_id.required'    => 'The video_url field is required..',
        ];

        $request->validate([
            'question'        => 'required',
            'option_1'        => 'required',
            'option_2'        => 'required',
            'option_3'        => 'required',
            'option_4'        => 'required',
            'correct_answer'  => 'required',
            'mock_bank_id'    => 'required',
        ],$errors);

        $mock_bank_question                 = MockBankQuestion::find($id);
        $mock_bank_question->question       = $request->question;
        $mock_bank_question->option_1       = $request->option_1;
        $mock_bank_question->option_2       = $request->option_2;
        $mock_bank_question->option_3       = $request->option_3;   
        $mock_bank_question->option_4       = $request->option_4;   
        $mock_bank_question->correct_answer = $request->correct_answer;   
        $mock_bank_question->mock_bank_id   = $request->mock_bank_id;   
        $mock_bank_question->save();
        return redirect()->back()->with('success','Mock Bank Question successfully updated');
    }
    
    //mockExams
    public function mockExams(){
        $mock_bank = MockBank::orderBy('id', 'DESC')->get();
        $mock_exam = MockExam::with('getMockBank')->get();
        return view('admin.mock_exam.mock_exam',compact('mock_bank','mock_exam'));
    }
    public function createMockExam(Request $request){
    //   dd(implode(",",$request->multi_select));
        $errors = [
            'title.required'         => 'The title field is required..',
            'image.required'         => 'The image field is required..',
            'mock_bank_id.required'  => 'The mock_bank_id field is required..',
        ];

        $request->validate([
            'title'         => 'required',
            'image'         => 'required',
            'mock_bank_id'  => 'required',
           
        ],$errors);
        
        $image        = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/images/'),$image);
        $title        = $request->title;
        $exam_id = $this->examId();
        foreach ($request->mock_bank_id as $key => $value) {
   
        $mock_exam                = new MockExam;
        $mock_exam->exam_id       = $exam_id;
        $mock_exam->mock_bank_id  = $value;   
        $mock_exam->title         = $title;
        $mock_exam->image         = $image;
        $mock_exam->save();
        }

        return redirect()->back()->with('success','Mock Bank Question successfully saved');
    }
    public function deleteMockExam($id){
        MockExam::find($id)->delete();
        return redirect()->back()->with('success','Mock Exam deleted successfully');
    }
    public function editMockExam($id){
        $mock_exam = MockExam::with('getMockBank')->find($id);
        $mock_bank_id = MockExam::where("exam_id",$mock_exam->exam_id)->get()->pluck('mock_bank_id');
        $mock_bank = MockBank::whereNotIn("id",$mock_bank_id)->orderBy('id', 'DESC')->get();
        return view('admin.mock_exam.edit_mock_exam',compact('mock_bank','mock_exam'));
    }
    public function updateMockExam(Request $request, $id){
        
        $errors = [
            'title.required'         => 'The title field is required..',
            'image.required'         => 'The image field is required..',
            'mock_bank_id.required'  => 'The mock_bank_id field is required..',
        ];

        $request->validate([
            'title'         => 'required',
            'image'         => 'required',
            'mock_bank_id'  => 'required',
           
        ],$errors);

        $mock_exam                = MockExam::find($id);
        $image                    = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/images/'),$image);
        $mock_exam->title         = $request->title;
        $mock_exam->exam_id         = $this->examId();
        $mock_exam->image         = $image;
        $mock_exam->mock_bank_id  = $request->mock_bank_id;   
        $mock_exam->save();
        return redirect()->back()->with('success','Mock Bank Question successfully updated');
    }

    //Tags
    public function Tags(){
        $tags = Tag::get();
        return view('admin.tags.tags',compact('tags'));
    }
    public function createTags(Request $request){
        $errors = [
            'name.required' => 'The name field is required..',
        ];

        $request->validate([
            'name'     => 'required', 
        ],$errors);

        $tags          = new Tag;
        $tags->name    = $request->name;
        $tags->save();
        return redirect()->back()->with('success','Tags successfully saved');
    }
    public function deleteTags($id){
        if($this->validateId($id,"tag_id","tag_banks") == true ){
            return redirect()->back()->with('success','This Tag used in other category');
        }
        else{
            Tag::find($id)->delete();
            return redirect()->back()->with('success','Tags deleted successfully');
        }
    }
    public function editTags($id){
        
        $tags = Tag::find($id);
        return view('admin.tags.edit_tags',compact('tags'));
    }
    public function updateTags(Request $request,$id){
        $errors = [
            'name.required' => 'The name field is required..',
        ];

        $request->validate([
            'name' => 'required', 
        ],$errors);

        $tags           =  Tag::find($id);
        $tags->name     = $request->name;
        $tags->save();
        return redirect()->back()->with('success','Tags successfully updated');
    }

    //tagsBanks
    public function tagsBanks(){
        $tags      = Tag::orderBy('id', 'DESC')->get();
        $mock_bank = MockBank::orderBy('id', 'DESC')->get();
        $tag_bank  = TagBank::with('getTag','getMockBank')->get();
        return view('admin.tags_bank.tags_bank', compact('tags','mock_bank','tag_bank'));
    }
    public function createTagBank(Request $request){
        $errors = [
            'tag_id.required'         => 'The tag type field is required..',
            'mock_bank_id.required'   => 'The mock bank type field is required..',
        ];

        $request->validate([
            'tag_id'         => 'required', 
            'mock_bank_id'   => 'required', 
        ],$errors);

        $tag_bank           = new TagBank;
        $tag_bank->tag_id   = $request->tag_id;
        $tag_bank->bank_id  = $request->mock_bank_id;
        $tag_bank->save();
        return redirect()->back()->with('success','Tag Bank successfully saved');
    }
    public function deleteTagBank($id){
        TagBank::find($id)->delete();
        return redirect()->back()->with('success','Tag Bank deleted successfully');
    }
    public function editTagBank($id){
        $tags      = Tag::orderBy('id', 'DESC')->get();
        $mock_bank = MockBank::orderBy('id', 'DESC')->get();
        $tag_bank  = TagBank::with('getTag','getMockBank')->find($id);
        return view('admin.tags_bank.edit_tag_bank',compact('tags','mock_bank','tag_bank'));
    }
    public function updateTagBank(Request $request, $id){
        $errors = [
            'tag_id.required'         => 'The tag type field is required..',
            'mock_bank_id.required'   => 'The mock bank type field is required..',
        ];

        $request->validate([
            'tag_id'         => 'required', 
            'mock_bank_id'   => 'required', 
        ],$errors);

        $tag_bank           = TagBank::find($id);
        $tag_bank->tag_id   = $request->tag_id;
        $tag_bank->bank_id  = $request->mock_bank_id;
        $tag_bank->save();
        return redirect()->back()->with('success','Tag Bank successfully updated');
    }

    //Assignments
    public function Assignments(){
        $assignment = Assignment::get();
        return view('admin.assignments.assignments', compact('assignment'));
    }
    public function createAssignments(Request $request){
        $errors = [
            'title.required'         => 'The title field is required..',
            'description.required'   => 'The description field is required..',
            'image.required'         => 'The image field is required..',
            'duration.required'      => 'The duration field is required..',
        ];

        $request->validate([
            'title'         => 'required', 
            'description'   => 'required', 
            'image'         => 'required', 
            'duration'      => 'required', 
        ],$errors);

        $Assignment              = new Assignment;
        $image                   = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/images/'),$image);
        $Assignment->title       = $request->title;
        $Assignment->description = $request->description;
        $Assignment->image       = $image;
        $Assignment->duration    = $request->duration;
        $Assignment->save();
        return redirect()->back()->with('success','Assignments successfully saved');
    }
    public function deleteAssignments($id){
        if($this->validateId($id,"assignment_id","assignment_images") == true 
        || $this->validateId($id,"assignment_id","assignment_students") == true){
            return redirect()->back()->with('success','This Assignment used in other category');
        }
        else{
            Assignment::find($id)->delete();
            return redirect()->back()->with('success','Assignment deleted successfully');
        }
    }
    public function editAssignments($id){
        $assignment = Assignment::find($id);
        return view('admin.assignments.edit_assignments',compact('assignment'));
    }
    public function updateAssignments(Request $request, $id){
        $errors = [
            'title.required'         => 'The title field is required..',
            'description.required'   => 'The description field is required..',
            'image.required'         => 'The image field is required..',
            'duration.required'      => 'The duration field is required..',
        ];

        $request->validate([
            'title'         => 'required', 
            'description'   => 'required', 
            'image'         => 'required', 
            'duration'      => 'required', 
        ],$errors);

        $Assignment              = Assignment::find($id);
        $image                   = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/images/'),$image);
        $Assignment->title       = $request->title;
        $Assignment->description = $request->description;
        $Assignment->image       = $image;
        $Assignment->duration    = $request->duration;
        $Assignment->save();
        return redirect()->back()->with('success','Assignments successfully updated');
    }

    //assignmentsImages
    public function assignmentsImages(){
        $assignment        = Assignment::orderBy('id', 'DESC')->get();
        $assignment_images = AssignmentImage::with('getAssignmentImages')->get();
        return view('admin.assignments.assignment_images', compact('assignment','assignment_images'));
    }
    public function createAssignmentImages(Request $request){
        $errors = [
            'assignment_id.required'  => 'The assignment type field is required..',
            'image.required'          => 'The images  field is required..',
        ];

        $request->validate([
            'assignment_id'  => 'required', 
            'image'          => 'required', 
        ],$errors);

        $assignment_images                 = new AssignmentImage;
        $image                             = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/images/'),$image);
        $assignment_images->assignment_id  = $request->assignment_id;
        $assignment_images->image          = $image;
        $assignment_images->save();
        return redirect()->back()->with('success','Assignments Images successfully saved');
    }
    public function deleteAssignmentIages($id){
        AssignmentImage::find($id)->delete();
        return redirect()->back()->with('success','Assignment Images deleted successfully');
    }
    public function editAssignmentImages($id){
        $assignment        = Assignment::orderBy('id', 'DESC')->get();
        $assignment_images = AssignmentImage::with('getAssignmentImages')->find($id);
        return view('admin.assignments.edit_assignment_images',compact('assignment_images','assignment'));
    }
    public function updateAssignmentImages(Request $request, $id){
        $errors = [
            'assignment_id.required'  => 'The assignment type field is required..',
            'image.required'          => 'The images  field is required..',
        ];

        $request->validate([
            'assignment_id'  => 'required', 
            'image'          => 'required', 
        ],$errors);

        $assignment_images                 =  AssignmentImage::find($id);
        $image                             = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/images/'),$image);
        $assignment_images->assignment_id  = $request->assignment_id;
        $assignment_images->image          = $image;
        $assignment_images->save();
        return redirect()->back()->with('success','Assignments Images successfully updated');
    }

    //assignmentsImages
    public function assignmentsStudents(){
        $user               = User::where('role','user')->orderBy('id', 'DESC')->get();
        $assignment         = Assignment::orderBy('id', 'DESC')->get();
        $assignment_student = AssignmentStudent::with(['getUser','getAssignment'])->get();
        return view('admin.assignments.assignments_student', compact('user','assignment','assignment_student'));
    }
    public function createAssignmentStudent(Request $request){
        $errors = [
            'user_id.required'       => 'The user type field is required..',
            'assignment_id.required' => 'The assignment type field is required..',
        ];

        $request->validate([
            'user_id'        => 'required', 
            'assignment_id'  => 'required', 
        ],$errors);

        $assignment_student                 = new AssignmentStudent;
        $assignment_student->user_id        = $request->user_id;
        $assignment_student->assignment_id  = $request->assignment_id;
        $assignment_student->save();
        return redirect()->back()->with('success','Assignment  successfully Added');
    }
    public function deleteAssignmentStudent($id){
        AssignmentStudent::find($id)->delete();
        return redirect()->back()->with('success','Assignment deleted successfully');
    }
    public function editAssignmentStudent($id){
        $user               = User::where('role','user')->orderBy('id', 'DESC')->get();
        $assignment         = Assignment::orderBy('id', 'DESC')->get();        
        $assignment_student = AssignmentStudent::with(['getUser','getAssignment'])->find($id);
        return view('admin.assignments.edit_assignment_student',compact('user','assignment','assignment_student'));
    }
    public function updateAssignmentStudent(Request $request, $id){
        $errors = [
            'user_id.required'       => 'The user type field is required..',
            'assignment_id.required' => 'The assignment type field is required..',
        ];

        $request->validate([
            'user_id'        => 'required', 
            'assignment_id'  => 'required', 
        ],$errors);

        $assignment_student                 = AssignmentStudent::find($id);
        $assignment_student->user_id        = $request->user_id;
        $assignment_student->assignment_id  = $request->assignment_id;
        $assignment_student->save();
        return redirect()->back()->with('success','Assignment  successfully updated');
    }
    public function submittedAssignments(){
        $submitted_data = AssignmentSubmit::get();
        return view('admin.assignments.submitted_assignment',compact('submitted_data'));
    }
    public function updateStatus(Request $request, $id){
     $update_status = AssignmentSubmit::find($id);
     $update_status->status = $request->status;
     $update_status->save();
     return redirect()->back()->with('success','Status updated Successfully');

    }

}
