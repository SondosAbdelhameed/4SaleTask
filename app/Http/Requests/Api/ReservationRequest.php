<?php

namespace App\Http\Requests\Api;


class ReservationRequest extends JsonRequest
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
            'customer_name' => ['required','max:150'],
            'customer_phone' => ['required', 'numeric', 'digits_between:11,15'],
            'table_id' => ['required', 'numeric', 'exists:tables,id'],
            'from_time' => ['required', 'date_format:Y-m-d H:i:s', 'after:now'],
            'to_time' => ['required', 'date_format:Y-m-d H:i:s', 'after:now', 'after:from_time'],
        ];
    }
}
