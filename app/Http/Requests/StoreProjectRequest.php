<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'title_project' => 'required|string',
            'development_start_date'=>'nullable|date',
            'development_end_date' =>'nullable|date',
            'image_base64' => 'nullable|longText',
            'image_mime' => 'nullable|string',
            'url_github' => 'nullable|string',
            'url_site' => 'nullable|string',
            'url_download' => 'nullable|string',
            'description' => 'nullable|longText',
            'project_category_id' => 'nullable|integer|exists:project_categories,id_project_category',
            'user_id' => 'required|integer|exists:users,id',
        ]; 
    }
}
