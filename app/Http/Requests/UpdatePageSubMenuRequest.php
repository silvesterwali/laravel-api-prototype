<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageSubMenuRequest extends FormRequest
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
            'page_menu_id' => 'required|integer',
            'title' => "required|string",
            "page_directory" => "required|string",
            "description" => "required|string",
            "sorting_number" => "required|integer"
        ];
    }
}
