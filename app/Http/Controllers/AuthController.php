<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function registre_show()
    {
        return view('auth.register');
    }

    public function registre(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|max:255',
            'phone' => 'required|min:10|max:11',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone
        ]);
        if ($user) {
            return redirect()->route('dashboard')->with('success', 'Registred successfully');
        } else {
            return redirect('/register_show')->with('error', 'Something went wrong');
        }
    }

    public function login_show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:255',
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard')->with('success', 'Logged in successfully');
        } else {
            return redirect('/login')->with('error', 'Wrong credentials');
        }
    }

    public function users_dashboard()
    {
        return view('users.dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login')->with('success', 'Logged out successfully');
    }

    public function admin_show()
    {
        return view('admin.admin');
    }

    public function admin_login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:255',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/dashboard')->with('success', 'Logged in successfully');
        } else {
            return redirect('/admin')->with('error', 'Wrong credentials');
        }

        // $admin = Admin::where('email', $request->email)->first();
        // if (!$admin || !Hash::check($request->password, $admin->password)) {
        //     return redirect('/admin')->with('error', 'Invalid credentials');
        // } else {
        //     return redirect('/dashboard')->with('success', 'Logged in successfully');
        // }
    }

    public function dashboard()
    {
        // Check if the authenticated user is an admin
        if (Auth::guard('admin')->check()) {
            return view('admin.dashboard'); // Return the admin dashboard view
        }

        // Check if the authenticated user is a regular user
        if (Auth::guard('web')->check()) {
            return view('users.dashboard'); // Return the user dashboard view
        }

        // If not authenticated, redirect to the login page
        return redirect()->route('login');
    }

    public function admin_logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin')->with('success', 'Logged out successfully');
    }

    public function forget_password_show()
    {
        return view('auth.forget_password');
    }
}
