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
        $width = $this->input('width') ?? 0;
        $height = $this->input('height') ?? 0;

        return [
            'name' => 'required',
            'width' => 'required|numeric|min:1|max:1000',
            'height' => 'required|numeric|min:1|max:1000',
            'label_elements' => 'required|array',
            'label_elements.*.element_id' => 'required',
            'label_elements.*.x' => 'required|numeric|min:0|max:'.$width,
            'label_elements.*.y' => 'required|numeric|min:0|max:'.$height,
            'label_elements.*.type' => 'required',
            'label_elements.*.size' => "numeric|required_if:label_elements.*.type,==,qr|min:1|max:1000", 
            'label_elements.*.font_size' => "numeric|required_if:label_elements.*.type,==,text|min:0|max:1000", 
        ];
    }

    public function messages()
    {
        return [
            'label_elements.*.element_id' => 'The label element field is required.',
            'label_elements.*.x.required' => 'X position is required.',
            'label_elements.*.x.max' => 'The x position must not be greater than width.',
            'label_elements.*.y.required' => 'Y position is required.',
            'label_elements.*.y.max' => 'The y position must not be greater than height.',
            'label_elements.*.size' => "The QR size is required.", 
            'label_elements.*.font_size' => "The font size is required.", 
        ];
    }
}
