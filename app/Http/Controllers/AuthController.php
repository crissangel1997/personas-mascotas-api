<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

/**
 * @group Autenticación
 *
 * Endpoints para login, logout y ver información del usuario autenticado.
 */
class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['login', 'register']]);
    }

     /**
     * Registrar un nuevo usuario
     *
     * @bodyParam name string requerido Nombre del usuario. Ejemplo: Juan Pérez
     * @bodyParam email string requerido Correo electrónico único. Ejemplo: juan@example.com
     * @bodyParam password string requerido Mínimo 6 caracteres. Ejemplo: secreto123
     *
     * @response 201 {
     *  "user": {
     *      "id": 1,
     *      "name": "Juan Pérez",
     *      "email": "juan@example.com",
     *      "updated_at": "2025-05-06T00:00:00.000000Z",
     *      "created_at": "2025-05-06T00:00:00.000000Z"
     *  },
     *  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9..."
     * }
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(['user' => $user, 'token' => $token], 201);
    }

    /**
     * Iniciar sesión
     *
     * @bodyParam email string requerido Correo del usuario. Ejemplo: juan@example.com
     * @bodyParam password string requerido Contraseña. Ejemplo: secreto123
     *
     * @response 200 {
     *  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9..."
     * }
     * @response 401 {
     *  "error": "Credenciales inválidas"
     * }
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Credenciales inválidas'], 401);
        }

        return response()->json(['token' => $token]);
    }
      /**
     * Cerrar sesión (invalidar token)
     *
     * @authenticated
     *
     * @response 200 {
     *  "message": "Sesión cerrada correctamente"
     * }
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json(['message' => 'Sesión cerrada correctamente']);
        } catch (JWTException $e) {
            return response()->json(['error' => 'No se pudo cerrar la sesión'], 500);
        }
    }

        /**
     * Refrescar token
     *
     * Devuelve un nuevo token JWT.
     *
     * @authenticated
     *
     * @response 200 {
     *  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9..."
     * }
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        try {
            $token = JWTAuth::refresh();
            return response()->json(['token' => $token]);
        } catch (TokenExpiredException $e) {
            return response()->json(['error' => 'El token ha expirado y no puede ser refrescado'], 401);
        } catch (JWTException $e) {
            return response()->json(['error' => 'No se pudo refrescar el token'], 500);
        }
    }

    /**
     * Obtener usuario autenticado
     *
     * Devuelve la información del usuario actualmente autenticado.
     *
     * @authenticated
     *
     * @response 200 {
     *  "id": 1,
     *  "name": "Juan Pérez",
     *  "email": "juan@example.com",
     *  "created_at": "2025-05-06T00:00:00.000000Z",
     *  "updated_at": "2025-05-06T00:00:00.000000Z"
     * }
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me() {
        return response()->json(Auth::user());
    }
}
