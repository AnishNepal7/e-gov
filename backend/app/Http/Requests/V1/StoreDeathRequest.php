<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeathRequest extends FormRequest
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
            'fatherName' => 'required|string|max:255', // Father name is required, must be a string, and limited to 255 characters
            'motherName' => 'required|string|max:255', // Mother name is required, must be a string, and limited to 255 characters
            'grandfatherName' => 'required|string|max:255', // Grandfather name is required, must be a string, and limited to 255 characters
            'citizenshipId' => 'required', // Date of birth is required, must be a valid date, and not in the future
            'gender' => 'required|string|in:Male,Female,Other', // Gender is required and limited to specific values
            'issuedBy' => 'required|string|max:255', // Issued by is required, must be a string, and limited to 255 characters
            //
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'father_name'=>$this->fatherName,
            'mother_name'=>$this->motherName,
            'grandfather_name'=>$this->grandfatherName,
            'issued_by'=>$this->issuedBy,
            'citizenship_id'=>$this->citizenshipId
        ]);
    }
}
