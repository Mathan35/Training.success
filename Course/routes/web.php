<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseTechnologyController;
use App\Http\Controllers\CourseTitleController;
use App\Http\Controllers\CourseTitleDescriptionController;
use App\Http\Controllers\PgDegreeController;
use App\Http\Controllers\UgDegreeController;
use App\Http\Controllers\BatchController;

use Illuminate\Support\Facades\Route;

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


Route::get('/',[HomeController::class, 'Index'])->name('home');

Route::get('/user-registration',[HomeController::class, 'register'])->name('user-register');

Route::post('auth-login',[LoginController::class, 'Login'])->name('auth-login');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    
Route::get('dashboard',[HomeController::class, 'Dashboard'])->name('dashboard');

//ug degree
Route::resource('ug-degree', UgDegreeController::class);

//pg degree
Route::resource('pg-degree', PgDegreeController::class);

//education detail
Route::get('education-detail',[HomeController::class, 'EducationDetail'])->name('education-detail');

//view course
Route::get('view-course/{id}',[HomeController::class, 'ViewCourse'])->name('view-course');

//submit enquiry
Route::get('enquiry/{id}',[HomeController::class, 'Enquiry'])->name('enquiry');

//view enquiry
Route::get('view-enquiry',[HomeController::class, 'ViewEnquiry'])->name('view-enquiry');

//admin routes
Route::middleware('IsAdmin')->group(function(){

Route::get('admin-dashboard',[AdminController::class, 'AdminDashboard'])->name('admin-dashboard');

//technology
Route::resource('technology', TechnologyController::class);

//course
Route::resource('course', CourseController::class);

//course-technology
Route::resource('course-technology', CourseTechnologyController::class);

//learning
Route::resource('learning', LearningController::class);

//learning
Route::resource('batch', BatchController::class);

//course title
Route::resource('course-title', CourseTitleController::class);

//course title description
Route::resource('course-title-description', CourseTitleDescriptionController::class);

//view enquiry
Route::get('enquiry-list/{status}',[AdminController::class, 'EnquiryList'])->name('enquiry-list');

//view enquiry
Route::get('enquiy-status/{id}/{status}',[AdminController::class, 'EnquiryStatus'])->name('enquiry-status');

//payment update
Route::get('payment-update/{id}',[AdminController::class, 'PaymentUpdate'])->name('payment-update');

//payment update
Route::get('payment-view',[AdminController::class, 'PaymentView'])->name('payment-view');

//payment store
Route::post('store-payment',[AdminController::class, 'StorePayment'])->name('store-payment');

//payment dtails
Route::get('payment-details',[AdminController::class, 'PaymentDetails'])->name('payment-details');

//payment dtails
Route::get('pending-payment',[AdminController::class, 'PendingPayment'])->name('pending-payment');

//payment history
Route::get('payment-history',[AdminController::class, 'PaymentHistory'])->name('payment-history');

//view payment
Route::get('view-payment/{enquiry_id}',[AdminController::class, 'ViewPayment'])->name('view-payment');

//users list
Route::get('users-list',[AdminController::class, 'UsersList'])->name('users-list');

//view user
Route::get('view-user/{id}',[AdminController::class, 'ViewUser'])->name('view-user');

//user status
Route::get('user-status/{id}/{status}',[AdminController::class, 'UserStatus'])->name('user-status');

//user course
Route::get('users-course',[AdminController::class, 'UserCourse'])->name('users-course');

//user course
Route::get('batch-users',[AdminController::class, 'BatchUsers'])->name('batch-users');

//user course
Route::get('view-batch-users/{id}',[AdminController::class, 'ViewBatchUsers'])->name('view-batch-users');

//Settings
Route::get('settings',[AdminController::class, 'Settings'])->name('settings');

//update Settings
Route::post('update-settings',[AdminController::class, 'UpdateSettings'])->name('update-settings');


});


});