<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserAuth extends Controller
{

    public function index()
{
    $cookieController = new CookieController();
    $response = $cookieController->setCookies(); // Get the response with the cookie set

    return $response;
}


    public function register(Request $request){
        $userFields = $request->validate([
            "name" => ['required', 'min:3', Rule::unique('users','name')],
            "email" => ['required', Rule::unique('users','email')],
            "password" => ['required', 'min:6', 'confirmed'],
        ]);

        $userFields['password'] = bcrypt($userFields['password']);
        $user = User::create($userFields);
        auth()->login($user);

        return redirect('/q2');
    }

    public function login(Request $request){
        $userFields = $request->validate([
            "email" => ['required'],
            "password" => ['required'],
        ]);

       
        if(auth()->attempt(['email' => $userFields['email'], 'password' => $userFields['password']])){
            $request->session()->regenerate();
        }

        return redirect('/q2');
    }

    public function logout(){
        auth()->logout();

        return redirect('/q2');
    }
}
