<?php

namespace App\Http\Requests\Graduates;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'name' => ['required', 'string'],
            'lastname' => ['required', 'string'],

            'document_type_id' => ['required', 'exists:document_types,id'],
            'document' => ['required', 'unique:people'],

            'birthdate' => ['required', 'date'],
            'birthdate_place_id' => ['required', 'exists:cities,id'],

            'phone' => ['required', 'string'],
            'telephone' => ['required', 'string'],
            'address' => ['required', 'string'],


            'code' => ['required', 'numeric', 'unique:users'],
            'email' => ['required', 'email', 'unique:people'],
            'company_email' => ['required', 'email', 'unique:users,email'],

            'image' => ['required', 'image', 'mimes:png,jpg']

        ];
    }
}
