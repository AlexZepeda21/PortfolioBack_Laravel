<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (empty($credentials['email']) || empty($credentials['password'])) {
            return response()->json([
                'success' => false,
                'message' => 'Correo y/o contraseña inválidos'
            ], 400);
        }

        // Validamos si las credenciales son correctas
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = JWTAuth::fromUser($user);

            // Obtén los roles del usuario
            $roles = $user->roles->pluck('name');

            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => $user,
                'roles' => $roles,  // Aquí devolvemos los roles del usuario
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Credenciales inválidas.'
        ], 400);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole('cliente');

        $roles = $user->getRoleNames();

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'success' => true,
            'message' => 'Usuario registrado correctamente',
            'token' => $token,
            'user' => $user,
            'roles' => $roles
        ], 201);
    }

    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'success' => true,
                'message' => 'Sesión cerrada correctamente.'
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al cerrar sesión.'
            ], 500);
        }
    }
}
