<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index(Request $request)
    {

        $add_user_right = Session::get("user")->can("create", User::class);
        $users = User::orderBy('id', 'desc')->get();
        return view("users.index", ["users" => $users, "add_user_right" => $add_user_right]);
    }

    public function create()
    {
        if (!Session::get("user")->can("create", User::class)) {
            abort(403, "You don't have permission");
        }
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
            Session::put("language", "EN");

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
            'profile_image' => 'nullable|mimes:jpg,png|max:2048'
        ]);

        // Getting the user
        $user = User::findOrFail($id);


        $user->update([
            'name' => $request->name,
            'family_name' => $request->family_name,
            'username' => $request->username,
        ]);

        // Updating password
        if ($request->password) {
            $user->update([
                "password" => Hash::make($request->password)
            ]);
        }

        // Adding profile image
        $image = $request->file('profile_image');
        if ($image) {
            $path = $image->store('images/profiles', 'public');
            $user->update([
                "profile_image" => $path
            ]);
        }


        return redirect()->route('users.index');
    }

    public function store(Request $request)
    {

        if (!Session::get("user")->can("create", User::class)) {
            abort(403, "You don't have permission");
        };
        // Validating
        $request->validate([
            'name' => 'required|min:3|max:20|alpha',
            'family_name' => 'required|min:3|max:20|alpha',
            'username' => 'required|min:3|max:20|alpha_num|unique:users',
            'password' => 'required|min:6|max:220',
            'email' => 'email|unique:users',
            'profile_image' => 'nullable|mimes:jpg,png|max:2048'
        ]);

        // Storing the user
        $user = User::create([
            'name' => $request->name,
            'family_name' => $request->family_name,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->name,
        ]);

        // Storing image
        $image = $request->file("profile_image");
        if ($image) {
            $path = $image->store('images/profiles', 'public');
            $user->update([
                "profile_image" => $path
            ]);
        }

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view("users.show", ["user" => $user]);
    }
}
