<?php

use App\Http\Controllers\teacher\teacherController;
use Illuminate\Support\Facades\Route;

//if the user is teacher

Route::middleware(['auth:api'])->prefix('/v1/teacher')->group(function (){
    Route::post('/add-course', [teacherController::class, 'addCourse']);
    Route::post('/add-video', [teacherController::class, 'addVideo']);
});
