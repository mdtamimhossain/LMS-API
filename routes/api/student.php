
<?php

use App\Http\Controllers\student\studentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api','student'])->prefix('/v1/student')->group(function (){

    Route::post('/course-enroll/{id}', [studentController::class, 'courseEnroll']);
    Route::post('/cancel-course/{id}', [studentController::class, 'cancelCourse']);
    Route::get('/enrolled-courses', [studentController::class, 'enrolledCourses']);
    Route::get('/enrolled-course/{id}', [studentController::class, 'enrolledCourse']);
    Route::get('/course-posts/{id}', [studentController::class, 'getPosts']);
    Route::post('/post/comment', [studentController::class, 'comment']);
    Route::get('/post/all-comment/{id}', [studentController::class, 'allComment']);
    Route::post('/post/delete-comment/{id}', [studentController::class, 'deleteComment']);
});

