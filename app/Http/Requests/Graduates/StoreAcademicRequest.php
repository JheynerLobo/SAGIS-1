<?php

namespace App\Http\Requests\Graduates;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreAcademicRequest extends FormRequest
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
            'university_name' => ['required', 'string'],
            'address' => ['required', 'string'], 
            'faculty_name' =>['required', 'string'],
            'program_name' =>['required', 'string'],
            'academic_level_id' => ['required', 'exists:academic_levels,id'],
            'university_place_id' => ['required'],
            'year' => ['required', 'string'],
        ];
    }
}
