<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AddCategoryRequest;
use App\Http\Requests\admin\editCategoryRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Http\Requests\Auth\VerificationRequest;
use App\Http\Services\admin\ApplicationService;
use App\Http\Services\admin\CategoryService;
use App\Http\Services\admin\CourseService;
use App\Http\Services\auth\AuthService;
use Illuminate\Http\JsonResponse;
use function App\Http\Controllers\randomNumber;

class CourseController extends Controller
{
    private CourseService $service;
    function __construct(CourseService $service)
    {
        $this->service=$service;
    }


    public function getCourses(): JsonResponse
    {

        return response()->json($this->service->getCourses());

    }
    public function getCourse($id): JsonResponse
    {

        return response()->json($this->service->getCourse($id));

    }
    public function deleteCourse($id): JsonResponse
    {

        return response()->json($this->service->deleteCourse($id));

    }
}
