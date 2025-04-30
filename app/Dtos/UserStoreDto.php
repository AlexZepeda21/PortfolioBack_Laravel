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

    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->input('name'),
            $request->input('email'),
            Hash::make($request->input('password')),
        );
    }


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}