<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends JsonRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'table_id' => ['required', 'numeric', 'exists:tables,id'],
            'customer_id' => ['required', 'numeric', 'exists:customers,id'],
            'reservation_id' => ['required', 'numeric', 'exists:reservations,id'],
            'user_id' => ['required', 'numeric', 'exists:users,id'],
            "items" => ['required', 'array', 'min:1'],
            "items.*.meal_id" => ['required', 'numeric', 'exists:meals,id'],
            "items.*.quantity" => ['required', 'numeric', 'min:1'],
        ];
    }
}
