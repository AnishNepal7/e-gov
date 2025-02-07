<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
        $method = $this->method();
        if($method=='PUT')
        {
            return [
                'name' => 'required|string|max:255', // Name is required, must be a string, and limited to 255 characters
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'phone' => 'required|string|regex:/^\d{10,15}$/', // Phone is required, must be a string, and match 10-15 digits
                'position' => 'required|string|max:255', // Position is required, must be a string, and limited to 255 characters
                'status' => 'required|integer|in:0,1', // Status is required, must be an integer, and values should be 0 or 1
                //
            ];

        }
        else{
            return [
                'name' => ['sometimes', 'required', 'string', 'max:255'], // Name is required, must be a string, and limited to 255 characters
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'phone' => ['sometimes', 'required', 'string', 'regex:/^\d{10,15}$/'], // Phone is required, must be a string, and match 10-15 digits
                'position' => ['sometimes', 'required', 'string', 'max:255'], // Position is required, must be a string, and limited to 255 characters
                'status' => ['sometimes', 'required', 'integer', 'in:0,1'] // Status is required, must be an integer, and values should be 0 or 1
            ];

        }
        
    }
}
