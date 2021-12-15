<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

Route::get('/',[UserController::class, 'Home']);


Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/check_assignments', [UserController::class, 'checkAssignments'])->name('check_assignments');
    Route::get('/submit_assignments', [UserController::class, 'submitAssignments'])->name('submit_assignments');
    Route::post('/create_submission', [UserController::class, 'createSubmission'])->name('create_submission');
    Route::get('/view_questions/{exam_id}', [UserController::class, 'viewQuestions'])->name('view_questions');
    Route::post('/validate_answer', [UserController::class, 'validateAnswers'])->name('validate_answer');
    Route::get('/test-result', [UserController::class, 'testResult'])->name('test_result');
    Route::get('/profile-details', [UserController::class, 'profileDetails'])->name('profile_details');
    Route::post('/create_profile', [UserController::class, 'createProfile'])->name('create_profile');
    
    
    Route::middleware('checkrole')->prefix('admin')->group(function(){

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

        //technology
        Route::get('/technology', [AdminController::class, 'Technology'])->name('technology');
        Route::post('/create_technology', [AdminController::class, 'createTechnology'])->name('create_technology');
        Route::get('/delete_technology/{id}', [AdminController::class, 'deleteTechnology'])->name('delete_technology');
        Route::get('/edit_technology/{id}', [AdminController::class, 'editTechnology'])->name('edit_technology');
        Route::post('/update_technology/{id}', [AdminController::class, 'updateTechnology'])->name('update_technology');

        //mock banks
        Route::get('/mock_banks', [AdminController::class, 'mockBanks'])->name('mock_banks');
        Route::post('/create_mock_banks', [AdminController::class, 'createMockBanks'])->name('create_mock_bank');
        Route::get('/delete_mock_bank/{id}', [AdminController::class, 'deleteMockBank'])->name('delete_mock_bank');
        Route::get('/edit_mock_bank/{id}', [AdminController::class, 'editMockBank'])->name('edit_mock_bank');
        Route::post('/update_mock_bank/{id}', [AdminController::class, 'updateMockBank'])->name('update_mock_bank');


        //mock banks questions
        Route::get('/mock_banks_question', [AdminController::class, 'mockBankQuestions'])->name('mock_banks_questions');
        Route::post('/create_mock_banks_question', [AdminController::class, 'createMockBanksQuestions'])->name('create_mock_banks_question');
        Route::get('/delete_mock_banks_question/{id}', [AdminController::class, 'deleteMockBankQuestions'])->name('delete_mock_banks_question');
        Route::get('/edit_mock_banks_question/{id}', [AdminController::class, 'editMockBankQuestions'])->name('edit_mock_banks_question');
        Route::post('/update_mock_banks_question/{id}', [AdminController::class, 'updateMockBankQuestions'])->name('update_mock_banks_question');


        //mock exams
        Route::get('/mock_exams', [AdminController::class, 'mockExams'])->name('mock_exams');
        Route::post('/create_mock_exam', [AdminController::class, 'createMockExam'])->name('create_mock_exam');
        Route::get('/delete_mock_exam/{id}', [AdminController::class, 'deleteMockExam'])->name('delete_mock_exam');
        Route::get('/edit_mock_exam/{id}', [AdminController::class, 'editMockExam'])->name('edit_mock_exam');
        Route::post('/update_mock_exam/{id}', [AdminController::class, 'updateMockExam'])->name('update_mock_exam');


        //tags
        Route::get('/tags', [AdminController::class, 'Tags'])->name('tags');
        Route::post('/create_tags', [AdminController::class, 'createTags'])->name('create_tags');
        Route::get('/delete_tags/{id}', [AdminController::class, 'deleteTags'])->name('delete_tags');
        Route::get('/edit_tags/{id}', [AdminController::class, 'editTags'])->name('edit_tags');
        Route::post('/update_tags/{id}', [AdminController::class, 'updateTags'])->name('update_tags');


        //tags banks
        Route::get('/tags_banks', [AdminController::class, 'tagsBanks'])->name('tags_banks');
        Route::post('/create_tag_bank', [AdminController::class, 'createTagBank'])->name('create_tag_bank');
        Route::get('/delete_tag_bank/{id}', [AdminController::class, 'deleteTagBank'])->name('delete_tag_bank');
        Route::get('/edit_tag_bank/{id}', [AdminController::class, 'editTagBank'])->name('edit_tag_bank');
        Route::post('/update_tag_bank/{id}', [AdminController::class, 'updateTagBank'])->name('update_tag_bank');


        //assignments
        Route::get('/assignments', [AdminController::class, 'Assignments'])->name('assignments');
        Route::post('/create_assignments', [AdminController::class, 'createAssignments'])->name('create_assignments');
        Route::get('/delete_assignments/{id}', [AdminController::class, 'deleteAssignments'])->name('delete_assignments');
        Route::get('/edit_assignments/{id}', [AdminController::class, 'editAssignments'])->name('edit_assignments');
        Route::post('/update_assignments/{id}', [AdminController::class, 'updateAssignments'])->name('update_assignments');


        //assignments images
        Route::get('/assignments_images', [AdminController::class, 'assignmentsImages'])->name('assignments_images');
        Route::post('/create_assignment_images', [AdminController::class, 'createAssignmentImages'])->name('create_assignment_images');
        Route::get('/delete_assignment_images/{id}', [AdminController::class, 'deleteAssignmentImages'])->name('delete_assignment_images');
        Route::get('/edit_assignment_images/{id}', [AdminController::class, 'editAssignmentImages'])->name('edit_assignment_images');
        Route::post('/update_assignment_images/{id}', [AdminController::class, 'updateAssignmentImages'])->name('update_assignment_images');


        //assignments images
        Route::get('/assignments_students', [AdminController::class, 'assignmentsStudents'])->name('assignments_students');
        Route::post('/create_assignments_students', [AdminController::class, 'createAssignmentStudent'])->name('create_assignments_students');
        Route::get('/delete_assignments_students/{id}', [AdminController::class, 'deleteAssignmentStudent'])->name('delete_assignments_students');
        Route::get('/edit_assignments_students/{id}', [AdminController::class, 'editAssignmentStudent'])->name('edit_assignments_students');
        Route::post('/update_assignments_students/{id}', [AdminController::class, 'updateAssignmentStudent'])->name('update_assignments_students');
        Route::get('/submitted_assignments', [AdminController::class, 'submittedAssignments'])->name('submitted_assignments');

        Route::post('/update_status/{id}', [AdminController::class, 'updateStatus'])->name('update_status');

    });
    

});

Route::get('/test', [UserController::class, 'test'])->name('test');

