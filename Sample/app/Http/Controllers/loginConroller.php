<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginConroller extends Controller
{
    public function login(){
        return view('login.signup');
    }
}
