<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function store(Request $request){

        $credentials=$request->validate([
           'email'=>['required','string','email'],
            'password'=>['required']
        ]);
        if(!Auth::attempt($credentials,$request->boolean('remember'))){//login fail
            throw ValidationException::withMessages([
                'email'=>__('auth.failed'),
            ]);
        }
        $request->session()->regenerate();

        return redirect()->intended()->with('status','estas logeado');
    }

    public function destroy(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('status','Has cerrado session');
    }
}
