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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('users',[HomeController::class, 'Users'])->name('users');

Route::post('create_users',[HomeController::class, 'createUser'])->name('create_users');

Route::get('view_users',[HomeController::class, 'viewUsers'])->name('view_users');


Route::get('roles',[HomeController::class, 'Roles'])->name('roles');

Route::post('create_roles',[HomeController::class, 'createRoles'])->name('create_roles');

Route::get('view_roles',[HomeController::class, 'viewRoles'])->name('view_roles');

