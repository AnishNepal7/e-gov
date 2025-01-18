<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoticeRequest extends FormRequest
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

            'title' => 'required|string|max:255', // Validate title as a required string with a max length of 255
            'description' => 'required|string',  // Validate description as a required string
            'date' => 'required|date|before_or_equal:today|date_format:Y-m-d', // Validate date as required, a valid date, and not in the future
            'status' => 'required|integer|in:0,1', // Validate status as a required integer with values 0 or 1
            //
        ];
    }
}
