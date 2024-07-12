<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\OrderCostWayEnum;
use Illuminate\Validation\Rule;

class PayOrderRequest extends JsonRequest
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
            'order_id' => ['required', 'numeric', 'exists:orders,id'],
            'pay_way' => ['required', 'numeric', Rule::enum(OrderCostWayEnum::class)],
            'amount_paied' => ['required', 'numeric'],

        ];
    }
}
