<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    // Login
    public function showLoginForm()
    {
        return view('login')->with('active', 'login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username_or_email' => 'required',
            'password' => 'required',
        ]);
    
        $field = filter_var($request->username_or_email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    
        if (Auth::attempt([$field => $request->username_or_email, 'password' => $request->password])) {
            return redirect()->route('home')->with('successful', 'Welcome! You have successfully logged in');
        }
    
        return back()->withErrors([
            'username_or_email' => 'Oh! Your credentials are living in another dimension. Please try again!',
        ])->withInput();
    }
    

    // Register
    public function showRegisterForm()
    {
        return view('register')->with('active', 'register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); 
        return redirect()->route('home')->with('successful', 'Welcome! Your account was successfully created');
    }
    
}
