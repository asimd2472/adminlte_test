<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserAuthController extends Controller
{
    public function index()
    {
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'min:6'],
            ]);

            if (Auth::attempt([
                'email' => $credentials['email'],
                'password' => $credentials['password'],
                'user_type' => 2,
                'status' => 1
            ])) {
                $request->session()->regenerate();

                return redirect()->route('user.profile')
                    ->with('success', 'Login successful!');
            }
            return back()->withErrors([
                'email' => 'Invalid credentials or not authorized as user',
            ])->withInput();

        } catch (ValidationException $e) {
            return back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Logged out successfully!');
    }
}
