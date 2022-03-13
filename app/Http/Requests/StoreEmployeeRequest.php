<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            "user_id"                => "required|integer|exists:users,id",
            "code_company"           => "required|string",
            "nik"                    => "string|unique:employees,nik",
            "fullname"               => "required|required",
            "pin2"                   => "string|required",
            "address"                => "string",
            "alternative_address"    => "string",
            "gender"                 => "required|integer|in:1,0",
            "religion"               => "string|exists:employee_religions,religion",
            "phone"                  => "string",
            "email"                  => "string|email",
            "place_of_birth"         => "string",
            "blood_type"             => "string|in:A,B,O,AB,A+,A-,B+,O+,O-,AB+,AB-",
            "marital_status"         => "string",
            "photo_character"        => "string",
            "gate_of_belief"         => "string",
            "employee_education_id"  => "integer|exists:employee_education,education_code",
            "office_id"              => "integer|exists:office,id",
            "employee_division_id"   => "integer|exists:employee_divisions,id",
            "employee_department_id" => "integer|exists:employee_departments,id",
            "employee_position_id"   => "integer|exists:employee_positions,id",
            "overtime"               => "integer|in:1,0",
            "off_duty"               => "date_format:H:i",
            "off_duty2"              => "date_format:H:i",
            "identity"               => "string|in:KTP,SIM,KK,PASSPORT",
            "identity_number"        => "string",
            "family_number"          => "string",
            "join_at"                => "date_format:Y-m-d",
            "status"                 => "string",
            "status_notes"           => "string",
            "resign_at"              => "date_format:Y-m-d",
            "resign_notes"           => "string",
            "shift"                  => "integer|in:1,2,3,4",
            "x_start"                => "integer|in:1,0",
            "pic"                    => "integer|in:1,0",
            "npwp"                   => "string",
        ];
    }
}
