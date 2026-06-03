<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();

        // Cek jika user belum login atau role di database tidak cocok dengan parameter
        if (!$user || $user->role !== $role) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized. Role ' . $role . ' required.',
                'data' => null
            ], 403);
        }
        return $next($request);
    }
}