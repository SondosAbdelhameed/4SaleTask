<?php

namespace App\Http\Requests\Api;


class TableAvailabilityRequest extends JsonRequest
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
            'guest_count' => ['required', 'numeric'],
            'certain_datetime' => ['required', 'date_format:Y-m-d H:i:s'],      
        ];
    }
}
