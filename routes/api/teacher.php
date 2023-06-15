<?php

use App\Http\Controllers\teacher\teacherController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1/teacher')->group(function (){
    Route::post('/apply', [teacherController::class, 'apply']);
    Route::post('/addCourse', [teacherController::class, 'addCourse']);
});
//if the user is teacher
Route::prefix('/v1/teacher')->group(function (){
    Route::post('/addCourse', [teacherController::class, 'addCourse']);
});
