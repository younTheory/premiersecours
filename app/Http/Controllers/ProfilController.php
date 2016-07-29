<?php

namespace App\Http\Controllers;

use App\Scenario;
use Illuminate\Http\Request;
use Auth;
use App\user;
use App\Score;
use App\Http\Requests;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // permet d'afficher le profil
    public function index(){
        $user = auth::user();
        $scoreObtenu = Score::scoreByUser($user->id)->sum('points');
        $scoreMax = Scenario::MaxPoints();
        return view('profil/index', compact('user','scoreObtenu', 'scoreMax'));
    }
    // permet de modier le profil
    public function edit(){
        $user = auth::user();
        $erreur = '';
        return view('profil/edit', compact('user', 'erreur'));
    }
    // permet de sauvegarder le nouveau profil
    public function update(){
        $pass1 = \Request::input('pass1');
        //modification du mot de passe
        if (!($pass1 == '')) {
            $pass2 = \Request::input('pass2');
            if ($pass1 != $pass2)
            {
                $erreur = 'Vos mots de passe ne correspondent pas.';
                return view('profil/edit', compact('erreur'));
            }
            // modification du mot de passe de l'utilisateur
            $user = auth::user();
            $user->password = bcrypt($pass1);
            $user->save();

        }
        $user = auth::user();
        $user->update(\Request::only('name', 'active'));
        return view('profil/success');
    }
}
