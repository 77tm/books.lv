<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    public function deleteUser(User $user)
    {
        // Delete user account
        $user->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'User account deleted successfully.');
    }

    public function makeAdmin(User $user)
    {
        // Update user role to admin (role = 1)
        $user->role = 1;
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'User role updated to admin.');
    }

    public function removeAdmin(User $user)
    {
        // Update user role to regular user (role = 0)
        $user->role = 0;
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Admin role removed.');
    }
}
