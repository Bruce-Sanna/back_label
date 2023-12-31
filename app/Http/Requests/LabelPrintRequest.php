<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class LabelPrintRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'width' => 'required',
            'height' => 'required',
            'pages' => 'required',
            'pages.*.quantity' => 'required|numeric|min:0|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'pages.*.quantity' => 'Negative quantities are not accepted.',
        ];
    }
}
