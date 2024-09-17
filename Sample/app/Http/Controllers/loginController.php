<?php

namespace App\Http\Controllers;
use App\Models\Login;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(){
        return view('login.signup');
    }
    public function store(Request $request){
        
      
        $data=$request->validate([

            'name'=>'required',
            'password'=>'required',
            'confirmpassword'=>'required'
        ]);


        $info=Login::create($data);
        return redirect(route('log-in.doit'));
        

    
    
    }
}
