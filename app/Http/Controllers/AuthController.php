<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use DB;

class AuthController extends Controller
{
    function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator, 'register')
                        ->withInput();
        }

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = md5($request->password);

        $user->save();

        Auth::login($user);
        return redirect('loggedIn');
    }

    function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(!$user){
            $error = ['email' => 'This user is not registered... Sorry'];
            return redirect('/')->withErrors($error, 'login');
        }

        if(md5($request->password) === $user->password){
            Auth::login($user);
            return redirect('loggedIn');
        }else{
            $error = ['password' => 'Wrong password... Sorry'];
            
            return redirect('/')->withErrors($error, 'login');
        }
    }

    function logout(Request $request)
    {
        $user = Auth::user();
        Auth::logout($user);

        return redirect('/');
    }
}
