<?php

use App\Http\Controllers\teacher\teacherController;
use Illuminate\Support\Facades\Route;

//if the user is teacher

Route::middleware(['auth:api','teacher'])->prefix('/v1/teacher')->group(function (){
    Route::post('/add-course', [teacherController::class, 'addCourse']);
    Route::post('/add-course', [teacherController::class, 'addCourse']);
    Route::post('/getCourses', [teacherController::class, 'getCourses']);
    Route::post('/getCourse', [teacherController::class, 'getCourse']);
    Route::post('/updateCourseName', [teacherController::class, 'updateCourseName']);
    Route::post('/updateCourseThumbnail', [teacherController::class, 'updateCourseThumbnail']);
    Route::post('/updateCourseDescription', [teacherController::class, 'updateCourseDescription']);
    Route::post('/add-post', [teacherController::class, 'addPost']);
    Route::get('/course-posts/{id}', [teacherController::class, 'getPosts']);
    Route::post('/delete-post/{id}', [teacherController::class, 'deletePost']);
});

