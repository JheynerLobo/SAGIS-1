<?php

namespace App\Http\Requests\SituationGraduate;

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
            'anio_graduation' => ['required','integer'],
            'graduados'=>['required','integer'],
            'anio_actual' => ['required', 'integer'],
            'independientes' => ['required', 'integer'],
            'dependientes' => ['required', 'integer'],
            'desempleados' => ['required', 'integer']
        
        ];
    }
}