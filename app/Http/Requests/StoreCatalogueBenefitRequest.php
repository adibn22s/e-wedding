<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCatalogueBenefitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasAnyRole(['teacher','owner']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'path_highlight' => 'required|string|max:255',
            'description' => 'required|string',
            'wedding_vendor_id' => 'required|integer',
            'category_id' => 'required|integer',
            'thumbnail' => 'required|image|mimes:png,jpg,svg',
            'price' => 'required|number|',
            'course_benefits.*' => 'required|string|max:255',
        ];
    }
}
