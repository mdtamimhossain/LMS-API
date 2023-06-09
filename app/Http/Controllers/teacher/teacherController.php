<?php

namespace App\Http\Controllers\teacher;
use App\Http\Controllers\Controller;
use App\Http\Requests\student\postCommentRequest;
use App\Http\Requests\teacher\courseRequest;
use App\Http\Requests\teacher\postRequest;
use App\Http\Requests\teacher\updateCourseDescriptionRequest;
use App\Http\Requests\teacher\updateCourseNameRequest;
use App\Http\Requests\teacher\updateCourseThumbnailRequest;
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
    public function addPost(postRequest $request): JsonResponse
    {

        return response()->json($this->service->addPost($request->all()));

    }
    public function getCourses (): JsonResponse
    {

        return response()->json($this->service->getCourses());

    }
    public function getCourse ($id): JsonResponse
    {

        return response()->json($this->service->getCourse($id));

    }
    public function updateCourseName (updateCourseNameRequest $request): JsonResponse
    {

        return response()->json($this->service->updateCourseName($request->all()));

    }
    public function updateCourseThumbnail (updateCourseThumbnailRequest $request): JsonResponse
    {

        return response()->json($this->service->updateCourseThumbnail($request->all()));

    }
    public function updateCourseDescription(updateCourseDescriptionRequest $request): JsonResponse
    {

        return response()->json($this->service->updateCourseDescription($request->all()));

    }
    public function getPosts($id): JsonResponse
    {

        return response()->json($this->service->getPosts($id));

    }
    public function deletePost($id): JsonResponse
    {

        return response()->json($this->service->deletePost($id));

    }
    public function comment(postCommentRequest $request): JsonResponse
    {

        return response()->json($this->service->comment($request->all()));

    }
    public function allComment($id): JsonResponse
    {

        return response()->json($this->service->allComment($id));

    }
    public function deleteComment($id): JsonResponse
    {

        return response()->json($this->service->deleteComment($id));

    }

}
