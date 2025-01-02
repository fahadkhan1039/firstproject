<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function data(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:11|unique:users,phone',
            'password' => 'required|confirmed|min:8',
        ], [
            'name.required' => 'Name is required.',
            'email.unique' => 'This email is already in use.',
            'phone.digits' => 'Phone number must be exactly 11 digits.',
            'password.confirmed' => 'Passwords do not match.',
        ]);

        // Create a new user record
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'User created successfully!');
    }
}
