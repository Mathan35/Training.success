<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [QuizController::class, 'index']);

Route::get('/viewQuiz/{id}', [QuizController::class, 'viewQuiz'])->name('view_quiz');

Route::post('/validateAnswer', [QuizController::class, 'validateAnswer'])->name('validate_answer');

Route::middleware('auth')->group(function () {

Route::get('/dashboard', [QuizController::class, 'dashboard'])->name('dashboard');

//Technology
Route::get('/technology', [QuizController::class, 'Technology'])->name('technology');
Route::post('/createTechnology', [QuizController::class, 'createTechnology'])->name('create_technology');
Route::get('/deleteTechnology/{id}', [QuizController::class, 'deleteTechnology'])->name('delete_technology');

//Quiz
Route::get('/quiz', [QuizController::class, 'Quiz'])->name('quiz');
Route::post('/createQuiz', [QuizController::class, 'createQuiz'])->name('create_quiz');
Route::get('/deleteQuiz/{id}', [QuizController::class, 'deleteQuiz'])->name('delete_quiz');

//Questions
Route::get('/questions', [QuizController::class, 'Questions'])->name('questions');
Route::post('/createQuestion', [QuizController::class, 'createQuestion'])->name('create_question');
Route::get('/deleteQuestion/{id}', [QuizController::class, 'deleteQuestion'])->name('delete_question');

//Quiz Technology
Route::get('/quiz_technology', [QuizController::class, 'quizTechnology'])->name('quiz_technology');
Route::post('/createQuizTechnology', [QuizController::class, 'createQuizTechnology'])->name('create_quiz_technology');
Route::get('/deleteQuizTechnology/{id}', [QuizController::class, 'deleteQuizTechnology'])->name('delete_quiz_technology');

});
