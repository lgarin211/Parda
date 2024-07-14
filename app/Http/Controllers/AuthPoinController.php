<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DataController as Data;

class AuthPoinController extends Controller
{
    public function SalesForm() {
        return view('Admin.SalesForm');
    }

    public function OwnerForm() {
        return view('Admin.OwnerForm');
    }

    public function Laporan() {
        return view('Owener.Laporan');
    }

    public function DetailLaporan() {
        return view('Owener.LaporanDetail');
    }
    public function LoginViewPoin() {
        return view('Login');
    }

    public function RegisterViewPoin() {
        return view('Register');
    }

    public function BarangMasuk() {
        return view('Admin.BarangMasuk');
    }

    public function Barang() {
        return view('Admin.Barang');
    }

    public function OwenerAccess() {
        return view('Admin.OwenerAccess');
    }

    public function kasir() {
        return view('Admin.Kasir');
    }

    function Datalist(){
        $Data = new Data();
        dd($Data->getSales());
        return view('Admin.Datalist');
    }
}

