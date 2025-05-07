<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return response()->json(['status' => 'Usuario no encontrado'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json([
                'status' => 'Token expirado',
                'message' => 'Tu sesión ha caducado. Por favor, inicia sesión nuevamente.'
            ], 401);
        } catch (TokenInvalidException $e) {
            return response()->json([
                'status' => 'Token inválido',
                'message' => 'Token de autenticación no válido'
            ], 401);
        } catch (JWTException $e) {
            return response()->json([
                'status' => 'Token no proporcionado',
                'message' => 'No se encontró el token de autenticación'
            ], 401);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'Error en la autenticación',
                'message' => $e->getMessage()
            ], 500);
        }

        return $next($request);
    }
}
