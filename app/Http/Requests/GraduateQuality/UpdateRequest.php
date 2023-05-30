<?php

namespace App\Http\Requests\GraduateQuality;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
        $id = $this->graduates;

        return [
            'nombre' => ['required','string'],
            'description' => ['required', 'string'],
            'date' => ['required', 'date'],
            'imagen' => ['image', 'mimes:png,jpg,jpeg']
        ];
    }
}