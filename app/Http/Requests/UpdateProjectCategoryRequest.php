<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Dtos\ProjectCategoryUpdateDto;

class UpdateProjectCategoryRequest extends FormRequest
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
            'title'=>'nullable|string',
            'image_base64'=>'nullable|string',
            'image_mime'=>'nullable|string',
            'description'=>'nullable|string',
            'summary' => 'nullable|string',
            'url' => 'nullable|string',
        ];
    }

    public function toDto(): ProjectCategoryUpdateDto
    {
        return new ProjectCategoryUpdateDto(
            $this->input(key: 'title'),
            $this->input(key: 'image_base64'),
            $this->input(key: 'image_mime'),
            $this->input(key: 'description'),
            $this->input(key: 'summary'),
            $this->input(key: 'url'),
        );
    }
}
