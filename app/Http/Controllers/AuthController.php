<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerUser(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:8|confirmed',
            ],
            [
                'name.required' => "Input name must fill",
                'name.max' => "Input maximal 225 characters",
                'email.required' => "Input email must fill",
                'email.email' => "Input email not match with email format",
                'email.max' => "Input maximal 225 characters",
                'email.unique' => "Your email already use ",
                'password.required' => "Input password must fill",
                'password.min' => "Input password minimal 8 characters",
                'password.confirmed' => "Input password and confirmation password must match"
            ]
        );
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        return redirect()->route('admin.index');
    }
    public function loginUser(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => "Input email must fill",
                'email.email' => "Input email not match with email format",
                'password.required' => "Input password must fill",
            ]
        );
        $detailUser = User::where('email', '=', $request->email)->first();
        if (!$detailUser) {
            return back()->withErrors(['email' => 'Email not found']);
        }
        if (!Hash::check($request->password, $detailUser->password)) {
            return back()->withErrors(['password' => 'Incorrect password']);
        }
        // Login user (simpan sesi)
        Auth::login($detailUser);

        // Redirect ke dashboard atau halaman lain setelah login sukses
        return redirect()->route('admin.index')->with('success', 'Login successful');
    }
    //
}
