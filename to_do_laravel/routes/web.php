<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [HomeController::Class, 'Index'])->name('dashboard')->middleware(['auth:sanctum', 'verified']);

Route::post('/createTask', [HomeController::Class, 'createTask'])->name('createTask')->middleware(['auth:sanctum', 'verified']);

Route::get('/deleteTask/{id}', [HomeController::Class, 'deleteTask'])->name('deleteTask')->middleware(['auth:sanctum', 'verified']);

