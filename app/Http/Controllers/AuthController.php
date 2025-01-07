<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $response = Http::withOptions(['verify' => false])->post('https://localhost:7270/api/User/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $user = $response->json();
            Cookie::put('user', $user);
            return redirect()->route('home');
        }

        return back()->withErrors(['message' => 'Registration failed.']);
    }

    public function login(Request $request)
    {
        $response = Http::withOptions(['verify' => false])->post('https://localhost:7270/api/User/login', [
            'name' => $request->name, // Include the name field
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Log the response for debugging
        Log::info('Login API Response:', $response->json());

        if ($response->successful()) {
            $user = $response->json();
            Session::put('user', $user);
            return redirect()->route('home');
        }

        return back()->withErrors(['message' => 'Login failed.']);
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login');
    }
}
