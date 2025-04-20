<?php
namespace App\Dtos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserStoreDto
{
    public function __construct(

        public string $name,
        public string $email,
        public string $password,
        public string $role

    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->input('name'),
            $request->input('email'),
            Hash::make($request->input('password')),
            $request->input('role')
        );
    }


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
        ];
    }
}