<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){

        $users = User::get();
        return view('users/index', compact('users'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $roles = Role::lists('role', 'id');
        return view('users/edit', compact('user', 'roles'));
    }
    public function store(){
        $pass1 = \Request::input('pass1');
        $pass2 = \Request::input('pass2');
        if ($pass1 != $pass2)
        {
            $erreur = 'Vos mots de passe ne correspondent pas.';
            $roles = Role::lists('role', 'id');
            return view('users/create', compact('roles','erreur'));
        }
        else{
            $nom = \Request::input('nom');
            $email = \Request::input('email');
            $active = \Request::input('active');
            $role = \Request::input('role_id');
            $pass = bcrypt(\Request::input('pass1'));
            $user = User::create(['name' =>  $nom, 'email' => $email, 'password' => $pass, 'active' => $active, 'role_id' => $role]);
        }
        return view('users/success', compact('nom'));
    }
    public function create(){
        $roles = Role::lists('role', 'id');
        $erreur = "";
        return view('users/create', compact('roles', 'erreur'));
    }
    public function update($id){

        $user = User::findOrFail($id);
        $user->update(\Request::all());
        return $this->index();
    }
}
