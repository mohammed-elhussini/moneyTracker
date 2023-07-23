<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'nullable|string',
            'transaction_date' => 'required|date',
            'cost' => 'required|numeric',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
            'payment_id' => 'required|exists:payments,id',
            'type' => 'required|in:income,expensive',
            'images' => 'nullable|array',
            'images.*' => 'image', // example: max 2MB file size
            'selected_images' => 'nullable|array',
            'selected_images.*' => 'exists:invoices,id',
        ];
    }
}
