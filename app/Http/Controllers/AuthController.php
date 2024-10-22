<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authenticate( Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required | email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            # code...
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // dd("jai");
            return redirect()->route('profile.index')->with('success','Logged In successfully');
        } else {
            // dd("shantaramag bedi");
            return redirect()->route('login')->with('error', 'Either email/password is incorrect');
        }
    }

    public function logout(){
        // dd("logout");
        Auth::logout();
        return redirect()->route('home')->with('success', "Logged Out Sucessfully!");
    }
}
