<?php

use App\Http\Controllers\auth\AuthController;
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


Route::prefix('/v1/user')->group(function (){
    Route::post('/register', [AuthController::class, 'register']);
    Route::POST('/login', [AuthController::class, 'login']);
    Route::POST('/verification', [AuthController::class, 'verification']);
    Route::get('/logout', [AuthController::class, 'logout']);
});
Route::prefix('/v1/teacher')->group(function (){
    Route::post('/register', [AuthController::class, 'teacherRegister']);
    Route::POST('/login', [AuthController::class, 'login']);
    Route::POST('/verification', [AuthController::class, 'verification']);
    Route::get('/logout', [AuthController::class, 'teacherLogout']);
});

require ('routes/api/admin.php');
require ('routes/api/teacher.php');
require ('routes/api/student.php');
