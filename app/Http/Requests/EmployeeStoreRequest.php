<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'id_card' => 'required|min:5|unique:users',
            'place_birth' => 'required|max:255',
            'date_birth' => 'required',
            'religion' => 'required|max:30',
            'phone' => 'required|max:20|min:7',
            'education' => 'required',
            'salary' => 'required',
            'devision' => 'required',
            'address' => 'required|max:255',
        ];
    }
}
