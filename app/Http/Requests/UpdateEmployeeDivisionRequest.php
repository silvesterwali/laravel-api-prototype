<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeDivisionRequest extends FormRequest
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
            'sorting_number' => 'required|integer',
            'division_code' => 'required|string|unique:employee_divisions,division_code,' . $this->employee_division['id'],
            'division' => 'required|string',
            "description" => "string|nullable"
        ];
    }
}
