<?php

namespace App\Http\Services\student;
use App\Http\Services\Service;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class studentService extends Service
{
    /**
     * @param array $data
     * @return array
     */

    public function courseEnroll($id): array
    {
        try{
            Enrollment::create([
                'course_id'=>$id,
                'student_id'=>Auth::id(),
            ]);
            return $this->responseSuccess('You have enrolled this course successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function enrolledCourses(): array
    {
        try{
                $course_ids=Enrollment::where('student_id',Auth::id())->where('cancel',false)->get();
                $courses=[];
            foreach($course_ids as $course_id)
            {
                $courses[]=Course::find($course_id['course_id']);
            }

            return $this->responseSuccess('All enrolled courses',['data'=>$courses]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function enrolledCourse(): array
    {
        try{
                $course_ids=Enrollment::where('student_id',Auth::id())->where('cancel',false)->get();
                $courses=[];
            foreach($course_ids as $course_id)
            {
                $courses[]=Course::find($course_id['course_id']);
            }

            return $this->responseSuccess('All enrolled courses',['data'=>$courses]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

}
