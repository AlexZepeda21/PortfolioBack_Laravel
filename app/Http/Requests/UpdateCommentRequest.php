<?php

namespace App\Http\Requests;
use App\Dtos\CommentUpdateDto;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
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
            'comment'=>'nullable|string',
            'guest_name'=>'nullable|string',
            'user_id'=>'nullable|int',
            'project_id'=>'nullable|int',
        ];
    }

    public function toDto(): CommentUpdateDto
    {
        return new CommentUpdateDto(
            $this->input('comment'),
            $this->input('guest_name'),
            $this->input('user_id'),
            $this->input('project_id'),
        );
    }
}
