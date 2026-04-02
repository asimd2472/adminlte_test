<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        try {
            // Validation
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'min:6'],
            ]);

            // Attempt Login
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->route('admin.dashboard')
                    ->with('success', 'Login successful!');
            }

            // Invalid credentials
            return back()->withErrors([
                'email' => 'Invalid credentials',
            ])->withInput();

        } catch (ValidationException $e) {

            return back()->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'Logged out successfully!');
    }
}
