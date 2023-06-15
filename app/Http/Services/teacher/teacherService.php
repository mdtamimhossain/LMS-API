<?php

namespace App\Http\Services\teacher;

use App\Http\Services\Service;
use App\Models\Category;
use App\Models\Course;
use App\Models\Teacher;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class teacherService extends Service
{
    /**
     * @param array $data
     * @return array
     */
    public function apply(array $data): array
    {
        try {
            $user=User::where('email',$data['email'])->get();
            if(!$user)
            {
                return $this->responseError("You need to create an account with this email first");
            }
            $imagePath = $data['photo']->store('public/teacher_photo');
            $videoPath = $data['video_resume']->store('public/videos');
            $cvPath = $data['cv']->store('public/cv');
            $imageUrl = Storage::url($imagePath);
            $videoUrl = Storage::url($videoPath);
            $cvUrl = Storage::url($cvPath);
            Teacher::create([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'number'=>$data['number'],
                'degree'=>$data['degree'],
                'university'=>$data['university'],
                'video_resume'=>$data['video_resume'],
                'photo'=>$data['photo'],
                'cv'=>$data['cv'],
            ]);

            return $this->responseSuccess("You application submitted successfully");
        }
        catch (\Exception $exception) {
            return $this->responseError($exception->getMessage());
        }
    }
    public function addCourse(array $data): array
    {
        try{
            Course::create([
               'course_name'=>$data['course_name'],
               'category_id'=>$data['category_id'],
               'user_id'=>$data['user_id'],
               'description'=>$data['description'],
                'slug'=>strtolower(str_replace(' ','-',$data['course_name'])),
            ]);
            return $this->responseSuccess('New Course Submitted For review successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function editCategory($id): array
    {
        try{
            $data=Category::find($id);
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
    public function deleteCategory($id): array
    {
        try{
            $category=Category::find($id);
            $category->delete();
            return $this->responseSuccess('Category deleted successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

}
