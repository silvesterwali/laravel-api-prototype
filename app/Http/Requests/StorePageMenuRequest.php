<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageMenuRequest extends FormRequest
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
            'title'          => 'required|string|unique:page_menus,title',
            'page_directory' => "required|string|unique:page_menus,page_directory",
            "icon_class"     => "required|string",
            "module"         => 'required|string',
            'sorting_number' => 'required|integer',
            'description'    => 'required|string',
        ];
    }
}
