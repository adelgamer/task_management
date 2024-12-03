<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {

        $users = User::orderBy('id', 'desc')->get();
        return view("users.index", ["users" => $users]);
    }

    public function create()
    {
        return view("users.create");
    }

    public function login(Request $request)
    {
        // Getting POST input
        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt(["username" => $username, "password" => $password])) {
            // Generate a session
            Session::put("user", Auth::user());

            // Redirect to dashboard
            return redirect()->route("dashboard");
        } else {
            return redirect()->route("login")->withErrors(["login" => "Username or password is incorrect"]);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }

    public function edit($id)
    {
        // Getting the user
        $user = User::findOrFail($id);

        return view("users.edit", ["user" => $user]);
    }

    public function update($id, Request $request)
    {
        // Validating data
        $request->validate([
            'name' => 'required|min:3|max:20|alpha',
            'family_name' => 'required|min:3|max:20|alpha',
            'username' => 'required|min:3|max:20|alpha_num',
            'password' => 'nullable|min:6|max:220',
        ]);

        // Getting the user
        $user = User::findOrFail($id);

        if (!$request->password) {
            $user->update([
                'name' => $request->name,
                'family_name' => $request->family_name,
                'username' => $request->username,
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'family_name' => $request->family_name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
        }


        return redirect()->route('users.index');
    }

    public function store(Request $request)
    {

        // Validating
        $request->validate([
            'name' => 'required|min:3|max:20|alpha',
            'family_name' => 'required|min:3|max:20|alpha',
            'username' => 'required|min:3|max:20|alpha_num|unique:users',
            'password' => 'required|min:6|max:220',
            'email' => 'email|unique:users'
        ]);

        // Storing the user
        User::create([
            'name' => $request->name,
            'family_name' => $request->family_name,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->name,
        ]);

        return redirect()->route('users.index');
    }

    public function show($id){
        $user = User::find($id);
        return view("users.show", ["user" => $user]);
    }
}
