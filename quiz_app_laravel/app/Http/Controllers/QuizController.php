<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
USE App\Models\Technology;
USE App\Models\Quiz;
USE App\Models\Question;
USE App\Models\QuizesTechnology;

class QuizController extends Controller
{

    public function index(){
        $getTech = Quiz::all();
        return view('welcome', compact('getTech'));
    }
    public function dashboard(){
        $technology = Technology::count();
        $quiz = Quiz::count();
        $questions = Question::count();
        return view('dashboard',compact('technology','quiz','questions'));
    }
    public function viewQuiz($id){
        $getQuestion = Question::where('quiz_id',$id)->get();
        return view('view_quiz', compact('getQuestion'));
    }


    //Technology
    public function Technology(){
        $technology = Technology::get();
        return view('admin.technology',compact('technology'));
    }
    public function createTechnology(Request $request){

        $errors = [
            'name.required'  => 'The name field is required..',
            'image.required' => 'The image field is required..',
        ];

        $request->validate([
            'name'  => 'required',
            'image' => 'required|max:2048',
        ],$errors);

        $technology = new Technology;

        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/images/'),$image);
        
        $technology->name        = $request->name;
        $technology->image       = $image;
        $technology->description = $request->description;
        $technology->save();
        return redirect()->back()->with('success', 'Technology successfully saved');
    }
    public function deleteTechnology($id){
        Technology::find($id)->delete();
        return redirect()->back();
    }


    //Quiz
    public function Quiz(){
        $quiz = Quiz::get();
        return view('admin.quiz',compact('quiz'));
    }
     public function createQuiz(Request $request){

        $errors = [
            'name.required'  => 'The name field is required..',
            'image.required' => 'The image field is required..',
        ];

        $request->validate([
            'name'  => 'required',
            'image' => 'required|max:2048',
        ],$errors);

        $quiz = new Quiz;

        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/images/'),$image);
        
        $quiz->name        = $request->name;
        $quiz->image       = $image;
        $quiz->description = $request->description;
        $quiz->save();
        return redirect()->back()->with('success', 'Quiz successfully saved');

    }
    public function deleteQuiz($id){
        Quiz::find($id)->delete();
        return redirect()->back();
    }

    public function Questions(){
        $question = Question::all();
        $quiz = Quiz::get();
        return view('admin.questions', compact('question','quiz'));
    }
    public function createQuestion(Request $request){

        $errors = [
            'question.required'        => 'The question field is required..',
            'option_1.required'        => 'The option_1 field is required..',
            'option_2.required'        => 'The option_2 field is required..',
            'option_3.required'        => 'The option_3 field is required..',
            'option_4.required'        => 'The option_4 field is required..',
            'correct_answer.required'  => 'The correct_answer field is required..',
            'quiz_id.required'         => 'The quiz_id field is required..',
        ];

        $request->validate([
            'option_1'        => 'required',
            'option_2'        => 'required',
            'option_3'        => 'required',
            'option_4'        => 'required',
            'correct_answer'  => 'required',
            'quiz_id'         => 'required',        
        ],$errors);

        $question = new Question;

        $question->question       = $request->question;
        $question->quiz_id        = $request->quiz_id;
        $question->option_1       = $request->option_1;
        $question->option_2       = $request->option_2;
        $question->option_3       = $request->option_3;
        $question->option_4       = $request->option_4;
        $question->correct_answer = $request->correct_answer;

        $question->save();
        return redirect()->back()->with('success', 'Question successfully saved');

    }
    public function deleteQuestion($id){
        Question::find($id)->delete();
        return redirect()->back();
    }



    public function quizTechnology(){
        $getData = QuizesTechnology::with(['getQuiz','getTechnology'])->get();
        $quiz = Quiz::get();
        $technology = Technology::get();
        return view('admin.quiz_technology', compact('quiz','technology','getData'));
    }
    public function createQuizTechnology(Request $request){

        $errors = [
            'quiz.required'        => 'The quiz field is required..',
            'technology.required'  => 'The technology field is required..',
        ];

        $request->validate([
            'quiz'        => 'required',
            'technology'  => 'required',
        ],$errors);

        $quiz_technology = new QuizesTechnology;
        $quiz_technology->quiz_id       = $request->quiz;
        $quiz_technology->technology_id = $request->technology;
        $quiz_technology->save();
        return redirect()->back()->with('success', 'Quiz Technology successfully saved');

    }
    public function deleteQuizTechnology($id){
        Question::find($id)->delete();
        return redirect()->back();
    }

    public function validateAnswer(Request $request){
        $data = 0;
        foreach ($request->answer as $value) {
            $data += Question::where('id', $value['res'])->where('correct_answer',$value['opt'])->count();
        }
        return view('result',['result'=> $data]);
    }

}
