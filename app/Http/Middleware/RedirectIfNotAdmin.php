<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'web')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/');
        }
        // test si il est admin
        $user = Auth::guard($guard)->user();
        if ($user->role_id == 1) {
            return $next($request);
        }
        return redirect('/');
    }
}
