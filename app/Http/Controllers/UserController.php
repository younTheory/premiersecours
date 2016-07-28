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

    public function update($id){

        $user = User::findOrFail($id);
        $user->update(\Request::all());
        return $this->index();
    }
}
