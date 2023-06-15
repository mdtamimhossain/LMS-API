<?php

namespace App\Http\Services\admin;

use App\Http\Services\Service;
use App\Jobs\SendEmails;
use App\Models\Category;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Webmozart\Assert\Tests\StaticAnalysis\length;

class CourseService extends Service
{

    public function getCourses(): array
    {
        try{
            $courses=Course::where('isApproved',false)->get();
            if($courses->count()==0){
                return $this->responseError('No unreviewed course available');
            }
            return $this->responseSuccess('All Pending Course For Review',['data'=>$courses]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function getCourse($id): array
    {
        try{
            $course=Course::find($id);
            return $this->responseSuccess('Specific application',['data'=>$course]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

}
