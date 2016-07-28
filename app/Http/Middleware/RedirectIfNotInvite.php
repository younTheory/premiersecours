<?php

namespace App\Http\Middleware;

use Closure;
use App\Cours;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotInvite
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'invites')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/');

        }
        $id_invite = $id_invite = auth()->guard('invites')->user()->id;
        $cours = Cours::CoursInvite($id_invite);
        // on vérifie que l'état du cours soit à en cours
        if($cours->etat_cours_id == 1){
            return $next($request);
        }

        $erreur = 'Le cours est actuellement désactivé, vous ne pouvez plus vous connecter dessus. Merci de regarder avec votre moniteur.';
        Auth::guard('invites')->logout();
        return view('/invite/login', compact('erreur'));



    }
}
