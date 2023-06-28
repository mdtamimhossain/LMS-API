<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AddCategoryRequest;
use App\Http\Requests\admin\editCategoryRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Http\Requests\Auth\VerificationRequest;
use App\Http\Services\admin\CategoryService;
use App\Http\Services\auth\AuthService;
use Illuminate\Http\JsonResponse;
use function App\Http\Controllers\randomNumber;

class CategoryController extends Controller
{
    private CategoryService $service;
    function __construct(CategoryService $service)
    {
        $this->service=$service;
    }

    /**
     * @param AddCategoryRequest $request
     * @return JsonResponse
     */
    public function addCategory (AddCategoryRequest $request): JsonResponse
    {

        return response()->json($this->service->addCategory($request->all()));

    }
    public function allCategory (): JsonResponse
    {

        return response()->json($this->service->allCategory());

    }
   public function getCategory ($id): JsonResponse
    {

        return response()->json($this->service->getCategory($id));

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
