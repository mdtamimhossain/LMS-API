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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test', function () {
    return response()->json([
        'success' => true,
        'message' => "Success"
    ]);
});

Route::prefix('/v1/user')->group(function (){
    Route::post('/register', [AuthController::class, 'register']);
    Route::POST('/login', [AuthController::class, 'login']);
    Route::POST('/verification', [AuthController::class, 'verification']);
    Route::get('/logout', [AuthController::class, 'logout']);
});
Route::prefix('/v1/teacher')->group(function (){
    Route::post('/register', [AuthController::class, 'teacherRegister']);
    Route::POST('/login', [AuthController::class, 'teacherLogin']);
    Route::POST('/verification', [AuthController::class, 'teacherVerification']);
    Route::get('/logout', [AuthController::class, 'teacherLogout']);
});

require ('routes/api/admin.php');
require ('routes/api/teacher.php');
require ('routes/api/student.php');
