<?php
namespace App\Services;

use App\Models\User;
use App\Dtos\UserStoreDto;
use App\Dtos\UserUpdateDto;

class UserService{
    public function store(UserStoreDto $dto): User
    {
        return User::create($dto->toArray());
    }
    public function update(User $user,UserUpdateDto $dto): User
    {
        $user-> update($dto->toArray());
        return $user;
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}

