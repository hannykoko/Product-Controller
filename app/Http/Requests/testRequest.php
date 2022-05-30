<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class testRequest extends FormRequest
{
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
            'name' => 'required|alpha',
            // 'father name' => '' ,

            //12/TGK(NAING)123456
            //[State Number]\[District]([NAING/N])[Register No]', 
            // 'NRC' => 'required|regex:(^([0-9]{1,2})\/([A-Za-z]{3}\((?:NAING)\)([0-9]{6})$))',

            //12/AaBaCcc(N)123456
            'NRC' => ['required','regex:/(^([0-9]{1,2})\/([A-Z][a-z]|[A-Z][a-z][a-z])([A-Z][a-z]|[A-Z][a-z][a-z])([A-Z][a-z]|[A-Z][a-z][a-z])\([N,P,E]\)[0-9]{6}$)/u'],

            // 'phone' => 'required|integer|digits:11',
            'phone' => 'required|numeric|starts_with:09|regex:(^[0-9]{11}$)',
            'email' => 'required|email',
            // 'address' => '',
            'gender' => 'required|integer|between:1,2',
            'DOB' => 'required|date_format:"d/m/Y"',
            'image' => 'required|mimes:jpg,bmp,png|max:10240'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The :attribute field is required.',
            'name.alpha' => 'The :attribute must only contain characters.',
            'NRC.regex' => 'The input is not a valid NRC format.',
            'phone.required' => 'The :attribute is required.',
            'phone.numeric' => 'The :attribute should be a numeric value.',
            // 'phone.digits' => 'The :attribute number must have 11 digits.',
            'phone.regex' => 'The :attribute number is not a valid phone number.',
            'email.required' => 'The :attribute is required.',
            'email.email' => 'The :attribute is not a valid email.',
            'gender.required' => 'The :attribute is required.',
            'gender.between' => 'The :attribute must be of range 1-2.',
            'DOB.required' => 'The :attribute is required',
            'DOB.date_format' => 'The :attribute format must be (dd/mm/yyyy).',
            'image.required' => 'The :attribute is required.',
            // 'image.image' => 'The :attribute must be an image.',
            'image.mimes' => 'The :attribute must be of type :values.',
            'image.max' => 'The :attribute must not be larger than 10MB.'
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json([$validator->errors()],422));
    // }
}
