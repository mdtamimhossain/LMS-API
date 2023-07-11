<?php

namespace App\Http\Controllers\student;
use App\Http\Controllers\Controller;
use App\Http\Requests\student\courseEnrollRequest;
use App\Http\Requests\teacher\courseRequest;
use App\Http\Services\student\studentService;
use Illuminate\Http\JsonResponse;
class studentController extends Controller
{
    private studentService $service;
    function __construct(studentService $service)
    {
        $this->service=$service;
    }


    /**
     * @param courseRequest $request
     * @return JsonResponse
     */
    public function courseEnroll (courseEnrollRequest $request): JsonResponse
    {

        return response()->json($this->service->courseEnroll($request->all()));

    }


}
