<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    // Method to handle user creation
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

    // Fetch all users for DataTables
    public function view_all_user(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select(['id', 'name', 'email', 'phone']);
            return DataTables::of($users)
                ->addColumn('action', function ($row) {
                    // Define the URLs for edit and delete actions
                    $editUrl = route('users.edit', $row->id);  // Route to edit user
                    $deleteUrl = route('users.delete', $row->id);  // Route to delete user

                    // Return custom HTML for buttons
                    return '
                        <a href="javascript:void(0);" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit-btn" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                            <span class="svg-icon svg-icon-3">
                                <!-- Icon SVG for Edit -->
                            </span>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1 delete-btn" data-id="' . $row->id . '">
                            <span class="svg-icon svg-icon-3">
                                <!-- Icon SVG for Delete -->
                            </span>
                        </a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.AllUserData');
    }

    // Fetch user data for editing
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    // Update user data
    public function update(Request $request, $id)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'phone' => 'required|digits:11|unique:users,phone,' . $id,
                'password' => 'nullable|confirmed|min:8',
            ]);

            $user = User::findOrFail($id);
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->phone = $validatedData['phone'];

            // Update password if provided
            if ($request->filled('password')) {
                $user->password = bcrypt($validatedData['password']);
            }

            $user->save();

            return response()->json(['success' => true, 'message' => 'User updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error updating user']);
        }
    }

    // Delete user data
    public function delete($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json(['success' => true, 'message' => 'User deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting user']);
        }
    }
}
