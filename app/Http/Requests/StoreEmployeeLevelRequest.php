<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeLevelRequest extends FormRequest
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
            'id'             => 'required|integer|unique:employee_levels',
            'sorting_number' => 'required|integer',
            'level_code'     => 'required|string|unique:employee_levels',
            'level'          => 'required|string|unique:employee_levels',
            'description'    => 'nullable|string',
        ];
    }
}
