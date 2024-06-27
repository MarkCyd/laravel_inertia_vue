<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        //validate
            sleep(3);
            $fields = $request->validate([
            'name'=> ['required','max:255'],
            'email'=> ['required','email','max:255','unique:users'],
            'password'=> ['required','confirmed']
             ]);
        //register
             $user = User::create($fields); //i forgot how this syntanx //need to pass data to $user for login purpose to pass username
        //login the user
             Auth::login($user); //auth the user so he can redirected to dashboard
        //redirect to dashboard
             return redirect()->route('home');
    }
    public function login(Request $request){
          //validate
          
    }
}
