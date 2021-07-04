<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class PomeranianInfoRequest extends FormRequest
{
    public $validator = null;

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'color' => 'required',
            'height' => 'required',
            'teeth' => 'required',
            'birthday' => 'required',
            'titles' => 'required',
            'age' => 'required',
            // bools
            'is_for_sale' => 'required',
            'is_male' => 'required',
            'is_open_for_breeding' => 'required',
            'has_fontanel' => 'required',
            // nullables
            'father' => 'nullable',
            'mother' => 'nullable',
            'owner' => 'nullable',
            'breeder' => 'nullable',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'body.required' => 'A message is required',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email' => 'email address',
        ];
    }
}
