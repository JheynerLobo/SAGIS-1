<?php

namespace App\Http\Requests\GraduateQuality;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'nombre' => ['required'],
            'description' => ['required', 'string'],
            'date' => ['required', 'date'],
            'image.*' => ['nullablle','image', 'mimes:png,jpg,jpeg, max:10240']
        ];
    }
}