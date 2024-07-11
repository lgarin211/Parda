<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthPoinController extends Controller
{
    function LoginViewPoin() {
        return view('Login');
    }
    function RegisterViewPoin(){
        return view('Register');
    }

    function Employe() {
        return view('Employe');
    }

    function Kasir() {
        // dd('aabalin');
        return view('Kasir');
    }
}

