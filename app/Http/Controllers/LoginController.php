<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $requestData = $request->only('email', 'password');

        $passwordField = $requestData['password'];
        $login = $requestData['email'];


        if(is_numeric($login)){
            $field = 'phone';
        } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } else {
            $field = 'username';
        }


        $credentials = [
            $field => $login,
            'password' => $passwordField,
        ];

        if (Auth::attempt($credentials, 1)) {
            // if success login

                if(session('cart') == null){
                    return redirect()->intended('/dashboard');
                }

                return redirect()->intended();



        }
        // if failed login
        return redirect('/')->with(['msg' => 'Your credentional not mathch']);
    }


    /**
     * Logout function goes here
    */
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
