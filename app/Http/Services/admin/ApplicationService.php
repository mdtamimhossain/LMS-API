<?php

namespace App\Http\Services\admin;

use App\Http\Services\Service;
use App\Jobs\SendEmails;
use App\Models\Category;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Webmozart\Assert\Tests\StaticAnalysis\length;

class ApplicationService extends Service
{

    public function getApplications(): array
    {
        try{
            $applications=Teacher::all();
            return $this->responseSuccess('All teaching application',['data'=>$applications]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function getApplication($id): array
    {
        try{
            $application=Teacher::find($id);
            return $this->responseSuccess('Specific application',['data'=>$application]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

}
