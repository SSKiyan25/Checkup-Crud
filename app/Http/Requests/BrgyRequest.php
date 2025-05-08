<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrgyRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                Rule::unique('brgys')->ignore(request()->route('brgy'))->where(function ($query) {
                    return $query->where('name', request()->name);
                }),
            ],
            'city_id' => [
                'required',
                'exists:cities,id',
            ]
        ];
    }

    // Custom error messages
    public function messages(): array
    {
        return [
            'name.required' => 'Barangay name is required.',
            'name.string' => 'Barangay name must be a string.',
            'name.unique' => 'Barangay name already exists.',
            'city_id.required' => 'Must select a city.',
            'city_id.exists' => 'City ID must exist in the cities table.',
        ];
    }
}