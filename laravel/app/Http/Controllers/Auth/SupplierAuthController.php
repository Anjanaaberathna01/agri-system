<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SupplierAuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $supplier = Supplier::where('email', $credentials['email'])->first();

        if ($supplier && Hash::check($credentials['password'], $supplier->password)) {
            Auth::guard('supplier')->login($supplier);

            // Check if password must be changed
            if ($supplier->must_change_password) {
                return redirect()->route('supplier.change-password')
                    ->with('info', 'You must change your password before continuing.');
            }

            return redirect()->route('supplier.dashboard')
                ->with('success', 'Welcome back, ' . $supplier->full_name);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('supplier')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out.');
    }

    public function showChangePasswordForm()
    {
        return view('supplier.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $supplier = Auth::guard('supplier')->user();

        if (!Hash::check($request->current_password, $supplier->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $supplier->update([
            'password' => Hash::make($request->new_password),
            'must_change_password' => false,
            'password_changed_at' => now(),
        ]);

        return redirect()->route('supplier.dashboard')
            ->with('success', 'Password changed successfully!');
    }
}
