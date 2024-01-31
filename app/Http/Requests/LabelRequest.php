<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $width = $this->input('width') ?? 0;
        $height = $this->input('height') ?? 0;

        return [
            'name' => ['required', Rule::unique('labels')->ignore($this->route('label'))],
            'width' => 'required|numeric|min:1|max:1000|decimal:0,2',
            'height' => 'required|numeric|min:1|max:1000|decimal:0,2',
            'label_elements' => 'required|array',
            'label_elements.*.element_id' => 'required',
            'label_elements.*.x' => 'required|numeric|decimal:0,2|min:0|max:'.$width,
            'label_elements.*.y' => 'required|numeric|decimal:0,2|min:0|max:'.$height,
            'label_elements.*.type' => 'required',
            'label_elements.*.text' => 'required_if:label_elements.*.element_id,==,free_text',
            'label_elements.*.size' => "numeric|decimal:0,2|required_if:label_elements.*.type,==,qr|min:1|max:1000", 
            'label_elements.*.font_size' => "numeric|decimal:0,2|required_if:label_elements.*.type,==,text|min:1|max:500", 
        ];
    }

    public function messages()
    {
        return [
            'label_elements.*.element_id' => 'The label element field is required.',
            'label_elements.*.x.required' => 'X position is required.',
            'label_elements.*.x.max' => 'The x position must not be greater than width.',
            'label_elements.*.x.min' => 'The x position must be at least 0.',
            'label_elements.*.x.decimal' => 'The x position field must have :decimal decimal places.',
            'label_elements.*.y.decimal' => 'The x position field must have :decimal decimal places.',
            'label_elements.*.y.required' => 'Y position is required.',
            'label_elements.*.y.max' => 'The y position must not be greater than height.',
            'label_elements.*.y.min' => 'The y position must be at least 0.',
            'label_elements.*.size.required_if' => "The QR size is required.", 
            'label_elements.*.size.decimal' => "The QR size field must have :decimal decimal places.", 
            'label_elements.*.font_size.required_if' => "The font size is required.", 
            'label_elements.*.font_size.decimal' => "The font size field must have :decimal decimal places.", 
            'label_elements.*.font_size.min' => "The font size must be greater than 0.",  
            'label_elements.*.text.required_if' => "The free text field is required.", 
        ];
    }
}
