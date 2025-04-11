<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    //

    // Display a listing of the resource.
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }
    // Show the form for creating a new resource.
    public function create()
    {
        return view('users.create');
    }
    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string|max:500',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        } else {
            $user->avatar = 'default.png';
        }
        $user->bio = $request->bio ?? 'This user has not set a bio yet.';
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
}
