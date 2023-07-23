<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'         => 'required|string',
            'description'  => 'nullable|string',
            'icon'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'parent_id'    => 'nullable|numeric',

            // exists:categories,id not work because there is not category id 0
            //'parent_id'    => 'nullable|numeric|exists:categories,id',
        ];
    }
}
