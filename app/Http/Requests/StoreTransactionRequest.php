<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            'transaction_date' => 'nullable|date_format:Y-m-d H:i',
            'cost' => 'required|numeric',
            'categories' => 'array',
            'categories.*' => 'numeric',
            'payment_id' => 'required|exists:payments,id',
            'type' => 'required|in:income,expensive',
            'images' => 'nullable|array',
            'images.*' => 'image', // example: max 2MB file size
            'notes' => 'nullable|array',
            'notes.*' => 'string',
        ];
    }
}
