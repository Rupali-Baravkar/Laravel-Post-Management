<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return redirect('login')->withErrors(['email' => 'Email invalid..!']);
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return redirect('login')->withErrors(['password' => 'Password invalid..!']);
        }

        if ($user->role !== 'admin') {
            return redirect('login')->withErrors(['role' => 'You do not have permission to access the admin dashboard.']);
        }
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/posts')->with('success', 'Login successfull..!');
        }

        return redirect('login')->withErrors(['login' => 'Login details are not valid']);
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        return redirect()->route('login')->with('success', 'Registration successfull..!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}
