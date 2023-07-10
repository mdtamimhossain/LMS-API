<?php

namespace App\Http\Requests\teacher;

use Illuminate\Foundation\Http\FormRequest;

class updateCourseNameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'course_name' => 'required|unique:courses',
            'course_id'=>'required',
        ];
    }
}
