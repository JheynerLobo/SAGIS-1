<?php

namespace App\Http\Requests\Admins;

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
    public function rules(){
        return [
            'name' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'document_type_id' => ['required', 'exists:document_types,id'],
            'document' => ['required', 'unique:people,id,' . $this->id, 'between:6,12'],
            'birthdate' => ['required', 'date'],
            'birthdate_place_id' => ['required', 'exists:cities,id'],
            'phone' => ['required', 'string', 'min:10'],
            'telephone' => ['required', 'string', 'min:6'],
            'address' => ['required', 'string'],
             'company_email' => [ 
                'required', 
                'email',
                Rule::unique('users', 'id')->ignore($this->user)
            
            ],
            'image' => ['image', 'mimes:png,jpg,jpeg']
        ];
    }
}
