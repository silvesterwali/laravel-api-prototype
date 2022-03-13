<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfficeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'office_code'       => "required|string|unique:office,office_code," . $this->office->id,
            "office"            => "required|string|unique:office,office," . $this->office->id,
            "description"       => "string",
            "overtime_time_pay" => "required|numeric",
            "different_time"    => "required|integer",
            "telephone"         => "required|string",
            "coce_code"         => "required|string",
            "on_duty_monday"    => "date_format:H:i",
            "off_duty_monday"   => "date_format:H:i",
            "on_duty_tuesday"   => "date_format:H:i",
            "off_duty_tuesday"  => "date_format:H:i",
            "of_duty_wednesday" => "date_format:H:i",
            "of_duty_wednesday" => "date_format:H:i",
            "on_duty_thursday"  => "date_format:H:i",
            "off_duty_thursday" => "date_format:H:i",
            "on_duty_friday"    => "date_format:H:i",
            "off_duty_friday"   => "date_format:H:i",
            "on_duty_saturday"  => "date_format:H:i",
            "off_duty_saturday" => "date_format:H:i",
            "on_duty_sunday"    => "date_format:H:i",
            "off_duty_sunday"   => "date_format:H:i",
            "on_shift_1"        => "date_format:H:i",
            "off_shift_1"       => "date_format:H:i",
            "on_shift_2"        => "date_format:H:i",
            "off_shift_2"       => "date_format:H:i",
            "on_shift_3"        => "date_format:H:i",
            "off_shift_3"       => "date_format:H:i",
        ];
    }
}
