<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view('signin');
    }

    public function registration(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|min:2|max:50',
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        return response()->json([
            'name'  => $validated['name'],
            'email' => $validated['email'],
        ]);
    }
}