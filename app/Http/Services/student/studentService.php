<?php

namespace App\Http\Services\student;
use App\Http\Services\Service;
use App\Models\Enrollment;

class studentService extends Service
{
    /**
     * @param array $data
     * @return array
     */

    public function courseEnroll(array $data): array
    {
        try{
            Enrollment::create([
                'course_id'=>$data['course_id'],
                'student_id'=>$data['student_id'],
            ]);
            return $this->responseSuccess('New Course Added  successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

}
