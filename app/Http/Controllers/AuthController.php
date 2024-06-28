<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request){
        //validate
        //   sleep(3);
        
        $fields = $request->validate([
            'name'=> ['required','max:255'],
            'email'=> ['required','email','max:255','unique:users'],
            'password'=> ['required','confirmed'],
            'avatar' => ['nullable','file','max:3000'],
             ]);

        if($request->hasFile('avatar'))
        {
            $fields['avatar'] = Storage::disk('public')->put('avatars',$request->avatar);             
        
        }
        //register
             $user = User::create($fields); //i forgot how this syntanx //need to pass data to $user for login purpose to pass username
        //login the user
             Auth::login($user); //auth the user so he can redirected to dashboard
        //redirect to dashboard
             return redirect()->route('dashboard');
    }
    public function login(Request $request){
     $fields = $request->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
      ]);

      if (Auth::attempt($fields, $request->remember)) {
          $request->session()->regenerate();

          return redirect()->intended('dashboard');
      }

      return back()->withErrors([
          'email' => 'The provided credentials do not match our records.',
      ])->onlyInput('email');
  
    }
    public function logout(Request $request){
     Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect()->route('home');
    }
}
