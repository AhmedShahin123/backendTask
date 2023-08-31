<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'user_image' => 'required|image|max:2048', // Max 2MB
        ];
    }

    public function messages()
    {
        return [
            'user_image.max' => 'The image size cannot exceed 2MB.',
        ];
    }
}
