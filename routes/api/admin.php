<?php

use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function (){
    Route::post('/addCategory', [CategoryController::class, 'addCategory']);
    Route::get('/allCategory', [CategoryController::class, 'allCategory']);
    Route::get('/editCategory/{id}', [CategoryController::class, 'editCategory']);
    Route::post('/updateCategory', [CategoryController::class, 'updateCategory']);
    Route::post('/deleteCategory/{id}', [CategoryController::class, 'deleteCategory']);
});
