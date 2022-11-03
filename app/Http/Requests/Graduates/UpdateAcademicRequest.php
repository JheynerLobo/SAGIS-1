<?php

namespace App\Http\Requests\Graduates;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAcademicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'academic_level_id' => ['required', 'exists:academic_levels,id'],
            /* 'program_name' =>['required', 'exists:programs,id'], */
            'program_name' =>['required', 'string'],
            'faculty_name' =>['required', 'string'],
            /* 'university_name' => ['required', 'exists:universities,id'], */
            'university_name' => ['required', 'string'],
            'year' => ['required', 'string'],
        ];
    }
}
