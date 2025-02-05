<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function data(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:11',
            'password' => 'required|confirmed|min:8',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',  // Image validation
        ], [
            'name.required' => 'Name is required.',
            'email.unique' => 'This email is already in use.',
            'phone.digits' => 'Phone number must be exactly 11 digits.',
            'password.confirmed' => 'Passwords do not match.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image size must not exceed 2MB.',
        ]);

        // Handle the image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Save image in public/images folder
        } else {
            $imagePath = null; // If no image, set it to null
        }

        // Create a new user record
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => Hash::make($validatedData['password']),
            'image' => $imagePath, // Store image path in database
        ]);

        // Return JSON response for AJAX requests
        return response()->json([
            'success' => true,
            'message' => 'User created successfully!',
        ], 200);
    }


    // Fetch all users for DataTables
    public function view_all_user(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select(['id', 'name', 'email','image', 'phone']);
            return DataTables::of($users)
                ->addColumn('action', function ($row) {
                    // Define the URLs for edit and delete actions
                    $editUrl = route('users.edit', $row->id);  // Route to edit user
                    $deleteUrl = route('users.delete', $row->id);  // Route to delete user

                    // Return custom HTML for buttons
                    return '
                        <a href="javascript:void(0);" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit-btn" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                            <span class="svg-icon svg-icon-3">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																			<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																		</svg>
                            </span>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1 delete-btn" data-id="' . $row->id . '">
                            <span class="svg-icon svg-icon-3">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																			<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																			<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																		</svg>
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
        // Find the user or return an error response if not found
        $user = User::find($id);
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found']);
        }

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'phone' => 'nullable|string',
            'password' => 'nullable|confirmed|min:8',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Image validation
        ]);

        // Update only the fields that were provided in the request
        if ($request->has('name')) {
            $user->name = $request->input('name');
        }
        if ($request->has('email')) {
            $user->email = $request->input('email');
        }
        if ($request->has('phone')) {
            $user->phone = $request->input('phone');
        }
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            // If an image already exists, delete it before storing the new one
            if ($user->image && file_exists(public_path('storage/' . $user->image))) {
                unlink(public_path('storage/' . $user->image));
            }
            $user->image = $imagePath; // Store the new image path
        }

        // Save the user data
        $user->save();

        // Return success response
        return response()->json(['success' => true, 'message' => 'User updated successfully']);
    }

    //  Delete user data
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
