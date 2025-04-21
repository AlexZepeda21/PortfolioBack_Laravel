<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Dtos\UserUpdateDto;

class UpdateUserRequest extends FormRequest
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
            'name'=>'string|required',
            'email'=>'string|required',
            'password'=>'string|required',
            'role'=>'string|required',
            ];
    }

    public function toDto(): UserUpdateDto
    {
        return new UserUpdateDto(
            $this->input('name'),
            $this->input('email'),
            $this->input('password'),
            $this->input('role'),
        );
    }
}
