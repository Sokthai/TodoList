<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DescriptionRequest extends FormRequest
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
            'desc' => 'required|min:6|max:128',
            'comment' => 'max:1024',
        ];
    }

    public function messages()
    {
        return [
            'desc.required' => 'Please enter a description',
            'desc.max' => 'Description can not longer than 128 characters',
            'comment.max' => 'Comment can not longer than 1024 characters'
        ];
    }
}
