<?php

namespace App\Http\Controllers\teacher;
use App\Http\Controllers\Controller;
use App\Http\Requests\teacher\courseRequest;
use App\Http\Requests\teacher\videoRequest;
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
     * @param courseRequest $request
     * @return JsonResponse
     */
    public function addCourse (courseRequest $request): JsonResponse
    {

        return response()->json($this->service->addCourse($request->all()));

    }
    public function addVideo (videoRequest $request): JsonResponse
    {

        return response()->json($this->service->addVideo($request->all()));

    }

}
