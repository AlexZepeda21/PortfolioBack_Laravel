<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Dtos\TechnologyUpdateDto;

class UpdateTechnologyRequest extends FormRequest
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
            'name_technology' => 'nullable|string',
            'description' => 'nullable|string',
            'image_base64' => 'nullable|string',
            'image_mime' => 'nullable|string',
        ];
    }

    public function toDto(): TechnologyUpdateDto
    {
        return new TechnologyUpdateDto(
            $this->input('name_technology'),
            $this->input('description'),
            $this->input('image_base64'),
            $this->input('image_mime'),
        );
    }
}
