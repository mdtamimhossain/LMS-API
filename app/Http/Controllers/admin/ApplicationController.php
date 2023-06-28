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
use App\Http\Services\auth\AuthService;
use Illuminate\Http\JsonResponse;
use function App\Http\Controllers\randomNumber;

class ApplicationController extends Controller
{
    private ApplicationService $service;
    function __construct(ApplicationService $service)
    {
        $this->service=$service;
    }


    public function getApplications(): JsonResponse
    {

        return response()->json($this->service->getApplications());

    }
    public function getApplication($id): JsonResponse
    {

        return response()->json($this->service->getApplication($id));

    }   public function approveApplication($id): JsonResponse
    {

        return response()->json($this->service->approveApplication($id));

    }
}
