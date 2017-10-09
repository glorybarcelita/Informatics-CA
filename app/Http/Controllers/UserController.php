<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function index(){
      $data = User::join('roles', 'users.role_id', '=', 'roles.id')
                  ->select('users.*', 'roles.name as role_name')
                  ->get();

      $roles = Role::all();

      return view('user.index', ['users'=>$data, 'roles'=>$roles]);
    }

    public function register(){
      $roles = Role::all();

      return view('auth.register', ['roles'=>$roles]);
    }

    public function store(Request $request){
      $request->validate([
        'role' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'school_index' => 'required|unique:users',
        'birthday' => 'required|date',
        'contact_no' => 'required',
        'address' => 'required',
        'email' => 'required|unique:users|email',
      ]);

      $data = New User();
      return $data->storeUser(
              $request->role,
              ucwords(strtolower($request->first_name)),
              ucwords(strtolower($request->middle_name)),
              ucwords(strtolower($request->last_name)),
              $request->school_index,
              $request->birthday,
              $request->contact_no,
              $request->address,
              $request->email
            );
    }

    public function edit(Request $request){
      $data = new User();
      return $data->editUser($request->id);
    }

    public function update(Request $request){
      $request->validate([
        'role' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'school_index' => 'required|numerics',
        'birthday' => 'required|date',
        'contact_no' => 'required|numerics',
        'address' => 'required',
        'email' => 'required|email',
      ]);

      $data = new User();
      return $data->updateUser(
        $request->role,
        ucwords(strtolower($request->first_name)),
        ucwords(strtolower($request->middle_name)),
        ucwords(strtolower($request->last_name)),
        $request->school_index,
        $request->birthday,
        $request->contact_no,
        $request->address,
        $request->email,
        $request->status,
        $request->user_id
      );
    }
}
