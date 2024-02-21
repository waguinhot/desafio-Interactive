<?php

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login' , [AuthController::class , 'login']);

Route::get('/all/users' , [UserController::class , 'index']);
Route::get('/user' , [AuthController::class , 'getUser'])->middleware('auth:sanctum');
Route::get('/user/get/{id}' , [UserController::class , 'getUserUnique']);

Route::delete('/user/delete/{id}' , [UserController::class , 'deleteUser']);
