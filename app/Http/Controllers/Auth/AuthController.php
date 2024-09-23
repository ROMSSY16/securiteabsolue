<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(){
        return view('backend.auth.login');
    }
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|string',
        ]);
        $cred = $request->only('email', 'password');

        if (Auth::attempt($cred)) {
            $request->session()->regenerate();
                return redirect()->intended('/dashboard');
        } else {
            Auth::logout();
            return back()->withErrors(['error' => 'Votre compte est inactif. Veuillez vous rendre au BARM pour l\activation.']);
        }
        
        return back()->with(['error' => 'Email ou mot de passe incorrect.']);

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}

