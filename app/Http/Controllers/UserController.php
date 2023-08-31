<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Storage;
use Validator;

class UserController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('create-user');
    }

    public function store(CreateUserRequest $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;

        if ($request->hasFile('user_image')) {
            $imagePath = $request->file('user_image')->store('user_images', 'public');
            $user->user_image = $imagePath;
        }

        $user->save();

        return redirect()->back()->with('success', 'User created successfully.');
    }
}
