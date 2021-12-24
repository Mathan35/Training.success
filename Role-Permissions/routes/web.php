<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

//home-dashboard
Route::get('/',[HomeController::class, 'Home'])->name('index');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [HomeController::class, 'Dashboard'])->name('dashboard');

//assign permissions to roles
Route::get('view-roles-permissions',[HomeController::class, 'viewRolesPermissions'])->name('view-roles-permissions');


//create user
Route::get('users',[HomeController::class, 'Users'])->name('users');
Route::post('create-users',[HomeController::class, 'createUsers'])->name('create-users');
Route::get('edit-users/{id}',[HomeController::class, 'editUsers'])->name('edit-users');
Route::post('update-users/{id}',[HomeController::class, 'updateUsers'])->name('update-users');

//create roles
Route::get('roles',[HomeController::class, 'Roles'])->name('roles');
Route::post('create-roles',[HomeController::class, 'createRoles'])->name('create-roles');
Route::get('view-roles',[HomeController::class, 'viewRoles'])->name('view-roles');
Route::get('edit-roles/{id}',[HomeController::class, 'editRoles'])->name('edit-roles');
Route::post('update-roles/{id}',[HomeController::class, 'updateRoles'])->name('update-roles');

//assign roles to user
Route::get('view-roles-users',[HomeController::class, 'viewRolesUsers'])->name('view-users-roles');

//athentication
Route::get('login-form', [LoginController::class, 'LoginForm'])->name('login-form');
Route::post('login', [LoginController::class, 'Login'])->name('login');
Route::post('logout-user', [LoginController::class, 'LogoutUser'])->name('logout-user');


Route::get('test-gate-1', [HomeController::class, 'testGate1'])->name('test-gate-1');
Route::get('test-gate-2', [HomeController::class, 'testGate2'])->middleware(['auth','can:check-middlware'])->name('test-gate-2');