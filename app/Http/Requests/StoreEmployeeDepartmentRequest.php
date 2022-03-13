<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeDepartmentRequest extends FormRequest
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
            'sorting_number'  => 'required|integer',
            "department_code" => "required|string|unique:employee_departments,department_code",
            "department"      => "required|string|unique:employee_departments,department",
            "description"     => "string|nullable",
        ];
    }
}
