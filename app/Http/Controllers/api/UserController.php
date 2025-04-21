<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Dtos\UserStoreDto;
use App\Dtos\UserUpdateDto;
use App\Services\UserService;



class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $dto = UserStoreDto::fromRequest($request);
        $user = $this->userService->store($dto);

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $dto = $request->toDto();
        $userUpdated = $this->userService->update($user, $dto);

        return response()->json($userUpdated, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->userService->delete($user);
        return response()->json(['message' => 'Usuario eliminado con éxito'], 200);
    }
}
