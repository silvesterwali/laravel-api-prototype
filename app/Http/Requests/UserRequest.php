<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if ($this->method() == 'POST') {
            return [
                'username' => "required|string|max:30|min:3|unique:users,username",
                'email' => "required|string|email|unique:users,email",
                'role' => "required|string",
                'user_group' => "required|string",
                'password' => "required|string|min:7|max:20|confirmed"
            ];
        }

        return [
            'username' => "required|string|max:30|min:3|unique:users,username,except,id",
            'email' => "required|string|email|unique:users,email,except,id",
            'role' => "required|string",
            'user_group' => "required|string",
        ];
    }
}
