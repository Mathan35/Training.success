<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Models\Post;
use App\Models\Video;
use App\Models\Comment;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
 
});
Route::post('register',[AuthController::class, 'Register']);

Route::post('login',[AuthController::class, 'authenticate']);

Route::get('test',[AuthController::class, 'test']);


// poly relationship
Route::get('onetoone',[AuthController::class, 'Onetoone']);
Route::get('getonetoone',[AuthController::class, 'Getonetoone']);

Route::get('onetomany',[AuthController::class, 'Onetomany']);
Route::get('getonetomany',[AuthController::class, 'Getonetomany']);

Route::get('manytomany',[AuthController::class, 'Manytomany']);
Route::get('getmanytomany',[AuthController::class, 'GetManytomany']);




Route::post('logout',[AuthController::class, 'Logout'])->middleware('auth:sanctum');
