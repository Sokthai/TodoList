<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'desc' => 'required|max:128',
            'name' => 'required|min:15|max:50',
            'type' => 'required',
            'newType' => 'max:30',
            'comment' => 'max:1024',
        ];
    }

    public function messages()
    {
        return [
            'desc.required' => 'Please enter a description',
            'desc.max' => 'Description can not longer than 128 characters',
            'name.required' => 'Please enter a project name',
            'name.max' => 'Name can not longer than 50 character',
            'name.min' => 'Name can not least than 15 characters',
            'type.required' => 'Please select a type of the project',
            'newType.max' => 'New type can not longer than 25 characters',
            'comment.max' => 'Comment can not longer than 1024 characters'
        ];
    }
}
