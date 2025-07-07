<?php

namespace App\Http\Controllers\Registeration;

use App\Http\Controllers\Controller;
use App\Models\Guset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registeration extends Controller
{
    function signin_in()
    {
        return view('auth.signing_in');
    }
    function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return view('login.authentication-signup-with-header-footer');
    }

    function sign_up()
    {
        return view('auth.signing_up');
    }
    function register(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:30',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'gender' => 'required',
            'TermsConditions' => 'required',
        ],[
            'username.required' => 'The Username is required',
            'username.min' => 'The Username must be at least 3 characters',
            'username.max' => 'The Username must not be greater than 30 characters',
            'email.required' => 'The Email is required',
            'email.unique' => 'The Email already exists',
            'password.required' => 'The Password is required',
            'confirm_password.required' => 'The Confirm Password is required',
            'phone.required' => 'The Phone is required',
            'address.required' => 'The Address is required',
            'image.required' => 'The Image is required',
            'image.image' => 'The Image must be an image',
            'image.mimes' => 'The Image must be a file of type: jpg, jpeg, png',
            'image.max' => 'The Image may not be greater than 2MB',
            'gender.required' => 'The Gender is required',
            'TermsConditions.required' => 'The TermsConditions is required',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'Learn_School_' . time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/images/users'), $imageName);
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Guset::create([
            'user_id' => $user->id,
            'username' => $request->username,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $imageName,
            'gender' => $request->gender,
            'permission' => $request->permission,
        ]);

        return view('dashboard');
    }
}
