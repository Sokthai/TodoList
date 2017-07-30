<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'required|min:2|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'firstAnswer' => 'required',
            'secondAnswer' => 'required',
            'thirdAnswer' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Name must be at least 2 characters',
            'name.max' => 'Name can not longer than 50 characters',
            'email.max' => 'Email can not longer than 255 characters',
            'password.min' => 'Password must be at least 6 characters',
            'firstAnswer' => 'The first answer is required',
            'secondAnswer' => 'The second answer is required',
            'thirdAnswer' => 'The third answer is required',
        ];
    }

}
