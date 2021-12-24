<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\RoleController;
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

Route::get('/', [HomeController::class, 'Index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
Route::get('/dashboard', [HomeController::class, 'Dashboard'])->name('dashboard');

Route::resource('Role', RoleController::class);

Route::resource('User', UserController::class);


//organization
Route::get('/organization', [HomeController::class, 'Organization'])->name('organization');
Route::post('/create-organization', [HomeController::class, 'CreateOrganization'])->name('create-organization');
Route::get('/view-organization', [HomeController::class, 'ViewOrganization'])->middleware('can:viewOrganization,App\Models\Organization')->name('view-organization');
Route::get('edit-organization/{id}', [HomeController::class, 'EditOrganization'])->middleware('can:editOrganization,App\Models\Organization')->name('edit-organization');
Route::post('/update-organization/{id}', [HomeController::class, 'UpdateOrganization'])->name('update-organization');
Route::get('/view-organizations', [HomeController::class, 'ViewOrganizations'])->middleware('can:viewOrganization,App\Models\Organization')->name('view-organizations');

//internal users
Route::get('/internal-user', [HomeController::class, 'InternalUser'])->name('internal-user');
Route::post('/create-internal-user', [HomeController::class, 'CreateInternalUser'])->name('create-internal-user');
Route::get('/view-internal-user', [HomeController::class, 'ViewInternalUser'])->name('view-internal-user');

//Organization Routes
Route::get('/organization-role', [OrganizationController::class, 'OrganizationRole'])->name('organization-role');
Route::post('/create-organization-role', [OrganizationController::class, 'CreateOrganizationRole'])->name('create-organization-role');
Route::get('/view-organization-role', [OrganizationController::class, 'ViewOrganizationRole'])->middleware('can:viewRole,App\Models\Role')->name('view-organization-role');
Route::get('/edit-organization-role', [OrganizationController::class, 'EditOrganizationRole'])->middleware('can:editRole,App\Models\Role')->name('edit-organization-role');


Route::get('/organization-users', [OrganizationController::class, 'OrganizationUsers'])->name('organization-users');
Route::post('/create-organization-users', [OrganizationController::class, 'CreateOrganizationUsers'])->name('create-organization-users');
Route::get('/view-organization-users', [OrganizationController::class, 'ViewOrganizationUsers'])->name('view-organization-users');

//for mail
// Route::get('/mail-sent', [OrganizationController::class, 'testemail'])->name('view-organization-users');
});
