<?php

namespace App\Http\Requests\Empleos;

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
        return [
            'empresa' => ['string'],
            'cargo'=> ['string'],
            'description' => ['string'],
            'date' => ['required', 'date'],
            'image' => ["array","max:5"], 
            'image.*' => ['required', 'image', 'mimes:png,jpg,jpeg, array, max:5'],
            'url_postulation' => ['string']
        ];
    }
}