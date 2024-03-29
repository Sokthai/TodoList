<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please enter your email',
            'password.required' => 'Please enter your password',
            'password.min' => 'Password must be at least 6 characters',
        ];
    }
}
