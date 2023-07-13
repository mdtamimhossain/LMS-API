
<?php

use App\Http\Controllers\student\studentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api','student'])->prefix('/v1/student')->group(function (){

    Route::post('/course-enroll/{id}', [studentController::class, 'courseEnroll']);
    Route::get('/enrolled-courses', [studentController::class, 'enrolledCourses']);
});

