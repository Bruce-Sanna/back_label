<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LabelRequest extends FormRequest
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
            'label_elements' => 'required|array',
            'label_elements.*.element_id' => 'required',
            'label_elements.*.x' => 'required',
            'label_elements.*.y' => 'required',
            'label_elements.*.size' => 'required', 
        ];
    }
}
