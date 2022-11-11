<?php

namespace App\Http\Requests\Graduates;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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

            'salary' => ['required', 'string'], 
            'in_working' => ['required'],
            'company_id' => ['required'],
            'company_place_id' => ['required'],
        ];
    }
}
