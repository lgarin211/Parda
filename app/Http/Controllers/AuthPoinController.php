<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthPoinController extends Controller
{
    function LoginViewPoin() {
        return view('Admin/Login');
    }
    function RegisterViewPoin(){
        return view('Admin/Register');
    }

    function Employe() {
        return view('Admin/Employe');
    }

    function Kasir() {
        // dd('aabalin');
        return view('Admin/Kasir');
    }
}

