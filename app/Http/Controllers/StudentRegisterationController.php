<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\testRequest;
use Illuminate\Support\Facades\Validator;

class StudentRegisterationController extends Controller
{
    // public function register(Request $request)
    public function register(testRequest $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => ['required','alpha'],
        //     'age' => ['required','integer','min:18']
        // ]);

        // if($validator->fails()){
        //     #error messages from ('resources/lang/validation.php')

        //     #get all errors
        //     return response()->json($validator->errors()->all(),422);

        //     #get the first error
        //     return response()->json($validator->errors()->first(),422);

        //     #get age error
        //     return response()->json($validator->errors()->get('age'),422);
        // }

        // #validation with custom message
        // $rules = [
        //     'name' => 'required',
        //     'age' => 'required|integer'
        // ];
        // $customMessages = [
        //     'name.required' => 'The :attribute field is required.',
        //     'age.required' => 'The :attribute field is aaaaa.',
        //     'age.integer' => 'The :attribute should be an integer.',
        // ];
        // $validator = Validator::make($request->all(), $rules, $customMessages);

        // if($validator->fails()){
        //     return response()->json($validator->errors()->all(),422);
        // }


        // $rules = [
        //     'name' => 'required|alpha',
        //     // 'father name' => '' ,

        //     //12/TGK(NAING)123456
        //     //[State Number]\[District]([NAING/N])[Register No]', 
        //     // 'NRC' => 'required|regex:(^([0-9]{1,2})\/([A-Za-z]{3}\((?:NAING)\)([0-9]{6})$))',

        //     //12/AaBaCcc(N)123456
        //     'NRC' => ['required','regex:/(^([0-9]{1,2})\/([A-Z][a-z]|[A-Z][a-z][a-z])([A-Z][a-z]|[A-Z][a-z][a-z])([A-Z][a-z]|[A-Z][a-z][a-z])\([N,P,E]\)[0-9]{6}$)/u'],

        //     // 'phone' => 'required|integer|digits:11',
        //     'phone' => 'required|numeric|starts_with:09|regex:(^[0-9]{11}$)',
        //     'email' => 'required|email',
        //     // 'address' => '',
        //     'gender' => 'required|integer|between:1,2',
        //     'DOB' => 'required|date_format:"d/m/Y"',
        //     'image' => 'required|image|max:10240'
        // ];
        // $customMessages = [
        //     'name.required' => 'The :attribute field is required.',
        //     'name.alpha' => 'The :attribute must only contain characters.',
        //     'NRC.regex' => 'The input is not a valid NRC format.',
        //     'phone.required' => 'The :attribute is required.',
        //     'phone.numeric' => 'The :attribute should be a numeric value.',
        //     // 'phone.digits' => 'The :attribute number must have 11 digits.',
        //     'phone.regex' => 'The :attribute number is not a valid phone number.',
        //     'email.required' => 'The :attribute is required.',
        //     'email.email' => 'The :attribute is not a valid email.',
        //     'gender.required' => 'The :attribute is required.',
        //     'gender.between' => 'The :attribute must be of range 1-2.',
        //     'DOB.required' => 'The :attribute is required',
        //     'DOB.date_format' => 'The :attribute format must be (d/m/Y).',
        //     'image.required' => 'The :attribute is required.',
        //     'image.image' => 'The :attribute must be a image.',
        //     'image.mimes' => 'The :attribute must be of type :values.',

        // ];
        // $validator = Validator::make($request->all(), $rules, $customMessages);

        // if($validator->fails()){
        //     return response()->json($validator->errors()->all(),422);
        // }

    }
}
