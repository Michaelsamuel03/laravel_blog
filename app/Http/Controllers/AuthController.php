<?php


    namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // this code to show the reg form 
    //------------------------------------
    public function registerForm() {
        return view('auth.register');
    }

    // required fields for reg 
    //----------------------------

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users', //required command to make it obligataory
            'password' => 'required|confirmed|min:6',
        ]);

        //how to create the user data 

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        Auth::login($user);
        return redirect('/posts');
    }

    // Show login form
    public function loginForm() {
        return view('auth.login');
    }

    // here i did how to login
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/posts');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

