<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
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
            'email' => 'required|email|max:255', // Email is required, must be a valid email,
            'description' => 'required|string', // Description is required and must be a string
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',

            //
        ];
    }
}
