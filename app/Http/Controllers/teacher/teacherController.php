<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AddCategoryRequest;
use App\Http\Requests\admin\editCategoryRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Http\Requests\Auth\VerificationRequest;
use App\Http\Requests\teacher\courseRequest;
use App\Http\Requests\teacher\teacherRequest;
use App\Http\Services\admin\CategoryService;
use App\Http\Services\auth\AuthService;
use App\Http\Services\teacher\teacherService;
use Illuminate\Http\JsonResponse;
use function App\Http\Controllers\randomNumber;

class teacherController extends Controller
{
    private teacherService $service;
    function __construct(teacherService $service)
    {
        $this->service=$service;
    }

    /**
     * @param teacherRequest $request
     * @return JsonResponse
     */
    public function apply (teacherRequest $request): JsonResponse
    {

        return response()->json($this->service->apply($request->all()));

    }
    public function addCourse (courseRequest $request): JsonResponse
    {

        return response()->json($this->service->addCourse($request->all()));

    }
   public function editCategory ($id): JsonResponse
    {

        return response()->json($this->service->editCategory($id));

    }
    public function updateCategory (editCategoryRequest $request): JsonResponse
    {

        return response()->json($this->service->updateCategory($request->all()));

    }
    public function deleteCategory ($id): JsonResponse
    {

        return response()->json($this->service->deleteCategory($id));

    }
}
