<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        $loginType = $request->input('login_type', 'user');

        if ($loginType === 'admin') {
            // Admin login using username
            $credentials = $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ], [
                'username.required' => 'Username is required.',
                'password.required' => 'Password is required.',
            ]);

            // Find admin user by username (using email field for storage)
            $adminUser = \App\Models\User::where('email', $credentials['username'])
                ->where('role', 'admin')
                ->first();

            if ($adminUser && Auth::attempt(['email' => $credentials['username'], 'password' => $credentials['password']])) {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard')->with('success', 'Welcome back, Admin!');
            }

            return back()
                ->withErrors([
                    'username' => 'Invalid admin credentials.',
                ])
                ->onlyInput('username');
        } else {
            // Regular user login using email
            $credentials = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ], [
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
                'password.required' => 'Password is required.',
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('home')->with('success', 'Welcome back!');
            }

            return back()
                ->withErrors([
                    'email' => 'These credentials do not match our records. Please check your email and password.',
                ])
                ->onlyInput('email');
        }
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out.');
    }
}
