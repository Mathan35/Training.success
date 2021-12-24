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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

Route::get('dashboard', [HomeController::class, 'Dashboard'])->name('dashboard');

//organization
Route::get('organization', [HomeController::class, 'Organization'])->name('organization');
Route::get('view-organization/{id}', [HomeController::class, 'ViewOrganization'])->name('view-organization');

//workspace
Route::get('workspace/', [HomeController::class, 'Workspace'])->name('workspace');
Route::get('view-workspace/{id}', [HomeController::class, 'ViewWorkspace'])->name('view-workspace');

//role
Route::get('role/', [HomeController::class, 'Role'])->name('role');
Route::get('view-role/{id}', [HomeController::class, 'ViewRole'])->name('view-role');

//project
Route::get('project/', [HomeController::class, 'Project'])->name('project');
Route::get('view-project/{id}', [HomeController::class, 'ViewProject'])->name('view-project');

//project
Route::get('task/', [HomeController::class, 'getTask'])->name('task');
Route::get('view-task/{id}', [HomeController::class, 'ViewTask'])->name('view-task');


//project
Route::get('user/', [HomeController::class, 'User'])->name('user');
Route::get('view-user/{id}', [HomeController::class, 'ViewUser'])->name('view-user');

});