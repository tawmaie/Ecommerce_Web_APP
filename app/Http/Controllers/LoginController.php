<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    function authenticate(Request $request){
        // get credentials from user.
        $data = $request->input();
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        if (Auth::attempt($credentials)) {
            // regenerate the new session ID
            session()->regenerate();
            // redirect to the requested URL or
            // to route product-list if does not specify
            if (Auth::user()->role == 'ADMIN'){
                return redirect()->intended(route('AdminHome'));
            }
            if (Auth::user()->role == 'OWNER'){
                return redirect()->intended(route('OwnerHome'));
            }
            return redirect()->intended(route('home'));
        }
        // if cannot authenticate redirect back to loginForm
        // with error message.
        return redirect()->back()->withErrors([
            'credentials' => 'The provided credentials do not match our records.',
        ]);
            
    }
    function loginForm() {
        return view('user.login');
    }

    function logout() {
        Auth::logout();
        session()->invalidate();
        // regenerate CSRF token
        session()->regenerateToken();
        return redirect()->route('home');
    }

        
}
