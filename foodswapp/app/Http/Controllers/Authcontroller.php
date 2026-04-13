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
}
