<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function registration (Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'email' => ['required', 'email','unique:users,email'],
            'password' => ['required', 'min:6','confirmed'],
        ]);

        User::create($data);

        return redirect()->route('login')->with('status','Registered. Please log in.');
    }

    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'=> ['required', 'email'],
            'password'=> ['required',],
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Wrong email or password'])->onlyInput('email');
        }

        $request->session()->regenerate();
        
        $user = Auth::user();
        $user->tokens()->delete();
        $request->session()->put('api_token', $user->createToken('web')->plainTextToken);

        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}