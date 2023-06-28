<?php

namespace App\Http\Services\teacher;

use App\Http\Services\Service;
use App\Models\Category;
use App\Models\Course;
use App\Models\Teacher;

use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class teacherService extends Service
{
    /**
     * @param array $data
     * @return array
     */

    public function addCourse(array $data): array
    {
        try{
            $imagePath = $data['thumbnail']->store('public/thumbnail');
            Course::create([
               'course_name'=>$data['course_name'],
               'category_id'=>$data['category_id'],
               'user_id'=>$data['user_id'],
               'description'=>$data['description'],
                'thumbnail'=>$imagePath,
                'slug'=>strtolower(str_replace(' ','-',$data['course_name'])),
            ]);
            return $this->responseSuccess('New Course Added  successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function addVideo(array $data): array
    {
        try{
            $course=Course::where('user_id',Auth::id())->where('id',$data['course_id'])->get();
            dd(Auth::user());
            if(!$course){
                return $this->responseError('you are not authorized to perform this action');
            }
            $videoPath = $data['video']->store(`public/"$course->name"/video`);
            Video::create([
                'course_id'=>$data['course_id'],
                'title'=>$data['title'],
                'video'=>$videoPath
            ]);
            return $this->responseSuccess('edit Category page ',['data'=>$data]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateCategory(array $data): array
    {
        try{
            Category::where('id',$data['id'])->update(['name'=>$data['name'],'description'=>$data['description']]);
            return $this->responseSuccess('Category updated successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }



}
