<?php

namespace Uc\Module\Core\Middleware;

use Closure;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guest()) {
            abort(403, 'Access denied! You need to login to access this page.');
        }

        /** @var ?User */
        $user = Auth::user();
        if ($user && !$user->isStudent()) {
            abort(403, 'Access denied! Only students have access to this page.');
        }

        return $next($request);
    }
}
