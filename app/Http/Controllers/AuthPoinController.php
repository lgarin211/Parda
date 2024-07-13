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

    function BarangMasuk() {
        return view('Admin/BarangMasuk');
    }
    function Barang() {
        return view('Admin/Barang');
    }


    function OwenerAccess() {
        return view('Admin/OwenerAccess');
    }

    function Kasir() {
        // dd('aabalin');
        return view('Admin/Kasir');
    }
}

