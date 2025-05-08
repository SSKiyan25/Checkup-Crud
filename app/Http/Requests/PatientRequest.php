<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientRequest extends FormRequest
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
            ],
            'brgy_id' => [
                'required',
                'exists:brgys,id',
            ],
            'number' => [
                'required',
                'string',
                'regex:/^(09|\+639)\d{9}$/',
                Rule::unique('patients')->ignore(request()->route('patient'))->where(function ($query) {
                    return $query->where('number', request()->number);
                }),
            ],
            'email' => [
                'nullable',
                'email:rfc,dns',
                'string',
                Rule::unique('patients')->ignore(request()->route('patient'))->where(function ($query) {
                    return $query->where('email', request()->email);
                }),
            ],
            'case_type' => [
                'required',
                'string',
                'in:PUI,PUM,Positive on Covid,Negative on Covid',
            ],
            'coronavirus_status' => [
                'required',
                'string',
                'in:active,recorded,death',
            ],
        ];
    }
}