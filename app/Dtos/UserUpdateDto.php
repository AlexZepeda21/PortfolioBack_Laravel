<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserUpdateDto
{
    public function __construct(

        public ?string $name,
        public ?string $email,
        public ?string $password,
        public ?string $role

    ) {
    }

    public static function fromRequest(Request $request): self
    {
        // Filtramos los datos para asegurarnos de que no haya valores nulos
        $data = array_filter($request->all(), fn($value) => !is_null($value));

        // Si el password está presente, lo hasheamos, si no, lo dejamos como null.
        $password = isset($data['password']) ? Hash::make($data['password']) : null;

        return new self(
            $data['name'] ?? null,
            $data['email'] ?? null,
            $password, // El password solo se hashea si está presente
            $data['role'] ?? null
        );
    }

    public function toArray(): array
    {
        return array_filter([ // Solo pasamos los valores no nulos
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
        ], fn($value) => !is_null($value)); // Filtramos valores nulos
    }
}
