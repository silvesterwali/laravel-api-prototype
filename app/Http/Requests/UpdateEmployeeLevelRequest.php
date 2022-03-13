<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeLevelRequest extends FormRequest
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
            'level_code'     => 'required|string|unique:employee_levels,level_code,' . $this->employee_level->id,
            'level'          => 'required|string|unique:employee_levels,level,' . $this->employee_level->id,
            'description'    => 'nullable|string',
        ];
    }
}
