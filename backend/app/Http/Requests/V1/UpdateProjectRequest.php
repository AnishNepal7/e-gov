<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
        $method=$this->method();
        if($method=='PUT')
        {
            return [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'date' => 'required|date|before_or_equal:today|date_format:Y-m-d',
                'phase' => 'required|integer|in:0,1', // Ensure phase is either 0 or 1
                'status' => 'required|integer|in:0,1', // Ensure status is either 0 or 1
                //
            ];

        }
        else{
            return [
                'title' => ['sometimes', 'required', 'string', 'max:255'],
                'description' => ['sometimes', 'required', 'string'],
                'date' => ['sometimes', 'required', 'date', 'before_or_equal:today', 'date_format:Y-m-d'],
                'phase' => ['sometimes', 'required', 'integer', 'in:0,1'],
                'status' => ['sometimes', 'required', 'integer', 'in:0,1']

            ];

        }
        
    }
}
