<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class showviews extends Controller
{
    //
    public function RegisterView() 
    {
        return view('layouts.register');    
    }

    public function LoginView() 
    {
        return view('layouts.login');    
    }

    public function ForgetPasswordView() 
    {
        return view('layouts.forget_password');    
    }

    public function passwordReset($email)
    {
        return view('layouts.passwor_reset',['email' => $email]);
    }
    

    public function CodeVerificationView() 
    {
        return view('layouts.code_verification');    
    }

    public function WelcomeView() 
    {
        return view('welcome');    
    }

}
