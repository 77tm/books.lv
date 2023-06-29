<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login()
    {
        if (Auth::check()) {
            return redirect(route('books.index'));
        }
        return view('home');
    }

    function registration()
    {
        if (Auth::check()) {
            return redirect(route('books.index'));
        }
        return view('registration');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only(htmlspecialchars('email'), htmlspecialchars('password'));
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('books.index'));
        }
        return redirect(route('home'))->with("error", "Login details are not valid");
    }

    function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = htmlspecialchars($request->name);
        $data['email'] = htmlspecialchars($request->email);
        $data['password'] = Hash::make(htmlspecialchars($request->password));
        $user = User::create($data);
        if (!$user) {
            return redirect(route('registration'))->with("error", "Registration failed");
        }
        return redirect(route('home'))->with("success", "Registration successful");
    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('home'));
    }


    function editProfile()
    {
        $user = Auth::user();
        return view('edit-profile', compact('user'));
    }

    function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|confirmed',
        ]);

        $user = Auth::user();
        $user->name = htmlspecialchars($request->name);
        $user->email = htmlspecialchars($request->email);

        if ($request->password) {
            $user->password = Hash::make(htmlspecialchars($request->password));
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }


    public function destroy()
    {
        $user = Auth::user();

        if (!$user) {
            // User not found
            return redirect()->route('home')->with('error', 'User not found.');
        }

        $user->delete();
        auth()->logout();

        return redirect()->route('home')->with('success', 'User deleted successfully.');
    }
}
