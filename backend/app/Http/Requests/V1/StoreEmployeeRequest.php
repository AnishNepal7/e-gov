<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'name' => 'required|string|max:255', // Name is required, must be a string, and limited to 255 characters
            'image' => 'nullable|string|max:255', // Image is required, must be a string, and limited to 255 characters
            'phone' => 'required|string|regex:/^\d{10,15}$/', // Phone is required, must be a string, and match 10-15 digits
            'position' => 'required|string|max:255', // Position is required, must be a string, and limited to 255 characters
            'status' => 'required|integer|in:0,1', // Status is required, must be an integer, and values should be 0 or 1
            //
        ];
    }
}
