<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeePositionRequest extends FormRequest
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
            'position_code' => 'required|string|unique:employee_positions,position_code,' . $this->employee_position->id,
            'position' => 'required|string|unique:unique:employee_positions,position' . $this->employee_position->id,
            'description' => 'string|nullable'
        ];
    }
}
