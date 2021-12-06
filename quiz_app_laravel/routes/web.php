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
Route::get('/dashboard', [QuizController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/viewQuiz/{id}', [QuizController::class, 'viewQuiz'])->name('view_quiz');

Route::post('/validateAnswer', [QuizController::class, 'validateAnswer'])->name('validate_answer');

//Technology
Route::get('/technology', [QuizController::class, 'Technology'])->middleware('auth')->name('technology');
Route::post('/createTechnology', [QuizController::class, 'createTechnology'])->middleware('auth')->name('create_technology');
Route::get('/deleteTechnology/{id}', [QuizController::class, 'deleteTechnology'])->middleware('auth')->name('delete_technology');

//Quiz
Route::get('/quiz', [QuizController::class, 'Quiz'])->middleware('auth')->name('quiz');
Route::post('/createQuiz', [QuizController::class, 'createQuiz'])->middleware('auth')->name('create_quiz');
Route::get('/deleteQuiz/{id}', [QuizController::class, 'deleteQuiz'])->middleware('auth')->name('delete_quiz');


Route::get('/questions', [QuizController::class, 'Questions'])->middleware('auth')->name('questions');
Route::post('/createQuestion', [QuizController::class, 'createQuestion'])->middleware('auth')->name('create_question');
Route::get('/deleteQuestion/{id}', [QuizController::class, 'deleteQuestion'])->middleware('auth')->name('delete_question');

Route::get('/quiz_technology', [QuizController::class, 'quizTechnology'])->middleware('auth')->name('quiz_technology');
Route::post('/createQuizTechnology', [QuizController::class, 'createQuizTechnology'])->middleware('auth')->name('create_quiz_technology');
Route::get('/deleteQuizTechnology/{id}', [QuizController::class, 'deleteQuizTechnology'])->middleware('auth')->name('delete_quiz_technology');

