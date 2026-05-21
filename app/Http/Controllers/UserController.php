<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }
    public function store(Request $request)
    {
        $val = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);
        //Hash password
        $val['password'] = bcrypt($val['password']);
        $user = User::create($val);
        Auth::login($user);
        return redirect('/')->with('message', 'user created and user in');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/')->with('message', 'You have been logged out!');
    }
    public function login()
    {
        return view('users.login');
    }
    public function authenticate(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home.index')->with('error', 'you are already log in');
        }
        
        $val = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (Auth::attempt($val)) {
            $request->session()->regenerate();
            return redirect()->route('home.index')->with('message', 'you are now log in !!!');
        }
        return back()->withErrors(['email' => 'Invalid 
        Credentials'])->onlyInput('email');
    }
}
