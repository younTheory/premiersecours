<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Auth;
use App\Invite;
use App\Cours;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InviteController extends Controller
{
    protected function InviteConnexion()
    {
        $erreur = '';
        return view('invite/login', compact('erreur'));
    }

    protected function InviteLogin()
    {
        $email = \Request::input('email');
        $password = \Request::input('password');
        if(auth()->guard('invites')->attempt(['email' => $email, 'password' => $password])){

            return redirect('/invite');

        }
        $erreur = 'Mauvaise combinaison d\'adresse E-mail, mot de passe.' ;
        return view('/invite/login', compact('erreur'));
    }



    public function InviteLogout()
    {

        Auth::guard('invites')->logout();


        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

}
