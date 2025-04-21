<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Dtos\ProjectUpdateDto;

class UpdateProjectRequest extends FormRequest
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
            'type_project' => 'nullable|string',
            'title_project' => 'nullable|string',
            'development_start_date'=>'nullable|date',
            'development_end_date' =>'nullable|date',
            'image_base64' => 'nullable|longText',
            'image_mime' => 'nullable|string',
            'url_github' => 'nullable|string',
            'url_site' => 'nullable|string',
            'url_download' => 'nullable|string',
            'description' => 'nullable|longText',
            'project_category_id' => 'nullable|integer|exists:project_categories,id_project_category',
        ]; 
    }

    public function toDto():ProjectUpdateDto
    {
        return new ProjectUpdateDto(
            $this->input('type_project'),
            $this->input('title_project'),
            $this->input('development_start_date'),
            $this->input('development_end_date'),
            $this->input('image_base64'),
            $this->input('image_mime'),
            $this->input('url_github'),
            $this->input('url_site'),
            $this->input('url_download'),
            $this->input('description'),
            $this->input('project_category_id'),
        );
    }
}
