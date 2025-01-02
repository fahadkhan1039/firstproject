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
    public function view_all_user(Request $request)
    {
        if ($request->ajax()) {
            // Retrieve all users without filtering by role
            $data = User::orderBy('id', 'DESC')->get();
    
            return Datatables::of($data)
                ->addColumn('action', function($data) {
                    $editUrl = route('edit-user', $data->id);
                    $deleteUrl = route('del-user', $data->id);
    
                    return '
                        <a href="'.$editUrl.'" class="btn btn-sm edit_data text-white" style="background-color: #000 !important; color:white">
                            <i class="ri-edit-line"></i>
                        </a>
                        <a href="'.$deleteUrl.'" class="btn btn-danger btn-sm">
                            <i class="ri-chat-delete-line"></i>
                        </a>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('admin.pages.AllUserData');
    }
    
}
