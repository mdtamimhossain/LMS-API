<?php

use App\Http\Controllers\admin\ApplicationController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1/admin')->group(function (){
    Route::post('/addCategory', [CategoryController::class, 'addCategory']);
    Route::get('/allCategory', [CategoryController::class, 'allCategory']);
    Route::get('/getCategory/{id}', [CategoryController::class, 'getCategory']);
    Route::post('/updateCategory', [CategoryController::class, 'updateCategory']);
    Route::post('/deleteCategory/{id}', [CategoryController::class, 'deleteCategory']);
    Route::get('/getApplications', [ApplicationController::class, 'getApplications']);
    Route::get('/getApplication/{id}', [ApplicationController::class, 'getApplication']);
    Route::post('/approve/{id}', [ApplicationController::class, 'approveApplication']);
    Route::post('/reject/{id}', [ApplicationController::class, 'rejectApplication']);
    Route::get('/getCourses', [CourseController::class, 'getCourses']);
    Route::get('/getCourse/{id}', [CourseController::class, 'getCourse']);
    Route::post('/deleteCourse/{id}', [CourseController::class, 'deleteCourse']);
});
