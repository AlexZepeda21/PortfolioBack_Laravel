<?php

namespace App\Http\Requests;

use App\Dtos\ImageUpdateDto;
use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
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
            'title_image'=>'nullable|string',
            'image_base64'=>'nullable|string',
            'image_mime'=>'nullable|string',
            'project_id'=>'nullable|string',
        ];
    }

    public function toDto(): ImageUpdateDto
    {
        return new ImageUpdateDto(
            $this->input('title_image'),
            $this->input('image_base64'),
            $this->input('image_mime'),
            $this->input('project_id'),
        );
    }
}
