
<?php

use App\Http\Controllers\student\studentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api','student'])->prefix('/v1/student')->group(function (){

    Route::post('/course-enroll/{id}', [studentController::class, 'courseEnroll']);
    Route::post('/cancel-course/{id}', [studentController::class, 'cancelCourse']);
    Route::get('/enrolled-courses', [studentController::class, 'enrolledCourses']);
    Route::get('/enrolled-course/{id}', [studentController::class, 'enrolledCourse']);
    Route::get('/course-video/{id}', [studentController::class, 'courseVideo']);
    Route::get('/course-posts/{id}', [studentController::class, 'getPosts']);
});

