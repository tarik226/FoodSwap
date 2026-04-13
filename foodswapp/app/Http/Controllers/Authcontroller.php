<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    //
    public function login(LoginRequest $request)
    {
         if (!Auth::attempt($request->validated())) {
            # code...
            // dd('non');
            return to_route('login')->with('error','invalid credentials');
        }else{
            // dd('oui');
            return to_route('Menu.index');
        }
    }


    public function register(RegisterRequest $request)
    {
        if (User::exists()) {
            # code...
            $user=User::create($request->validated());
            $user->role='admin';
            $user->save();
        }else{
            $user=User::create($request->validated());
            $user->role='client';
            $user->save();
        }
        
        return to_route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
        return to_route('login'); 
    }
}
