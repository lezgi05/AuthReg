<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function cabinet(){
        return view('cabinet');
    }

    public function registr(Request $data){
        $valid = $data->validate([
            'tel_reg'=>['required','string',],
            'password_reg'=>['required','confirmed','min:8'],
            'password_confirmation'=>['required']

        ]);

        $user = User::create([
            'tel' =>$data['tel'],
            'password'=> bcrypt($data['password']),
        ]);

        if($user){
            auth('web')->login($user);
        }

        return redirect()->route('cabinet');
    }

    public function login(Request $request){
        
        $data = $request->validate([
            'tel'=>['required','string',],
            'password'=>['required','min:8'],
        ]);

        if(auth('web')->attempt($data)){
            return redirect()->route('cabinet');
        }else{
            return redirect()->route('home')->withErrors([
                'tel_login'=>'Телефон или пароль не совпадают'
            ]);
        } 
    }

    public function exit(){
        auth('web')->logout();
        return redirect()->route('home');
    }
    

    
}
