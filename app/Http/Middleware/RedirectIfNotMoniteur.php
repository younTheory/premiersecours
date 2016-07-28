<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class RedirectIfNotMoniteur
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

        if (!(Auth::guard($guard)->check())) {
            return redirect('/');
        }
        // test si il est admin ou moniteur
        $user = Auth::guard($guard)->user();
        if ($user->role_id <= 2) {
            return $next($request);
        }
        return redirect('/');
    }
}
