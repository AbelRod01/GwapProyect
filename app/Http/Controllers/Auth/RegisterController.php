<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{

    public function store(Request $request){


        $request->validate([
            'name'=>['required','string','max:255','unique:users'],
            'email'=>['required','string','email','max:255','unique:users'],
            'password'=>['required','confirmed',Rules\Password::defaults()]
        ]);

        User::Create(['name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
    ]);

        // Auth::login($user); logear automaticamente.

        return to_route('login')->with('status','su cuenta ha sido creada');

    }
}
