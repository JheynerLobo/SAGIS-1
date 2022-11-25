<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('web')->check();
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
            'document' => ['required', 'unique:people,id,' . $this->id],
            'birthdate' => ['required', 'date'],
            'birthdate_place_id' => ['required', 'exists:cities,id'],
            'phone' => ['required', 'string'],
            'telephone' => ['required', 'string'],
            'address' => ['required', 'string'],
            'code' => ['required', 'numeric', 'unique:users,id'],
            'email' => ['required', 'email', 'unique:people,id'],
             'company_email' => [ 
                'required', 
                'email',
                Rule::unique('users', 'id')->ignore($this->user)
            
            ],
            'image' => ['image', 'mimes:png,jpg,jpeg']
        ];
    }
}
