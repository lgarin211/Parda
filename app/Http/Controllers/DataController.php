<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{

    public function PenjualanData()
    {
       $data= DB::table('penjualan_c');
        return $data;
    }
    // DataUser Login
    public function getUser()
    {
        $user = DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.id_user')
            ->join('roles', 'user_roles.id_role', '=', 'roles.id')
            ->join('user_tokos', 'users.id', '=', 'user_tokos.id_user')
            ->join('tokos', 'user_tokos.id_toko', '=', 'tokos.id');

        return $user;
    }

    // Menampilkan Daftar Penjualan dengan Detail Produk dan Toko
    public function getSales()
    {
        $sales = DB::table('penjualans')
                ->join('penjualan_produks', 'penjualans.id_jual', '=', 'penjualan_produks.id')
                ->join('tokos', 'penjualans.id_toko', '=', 'tokos.id')
                ->join('produks', 'penjualan_produks.id_produk', '=', 'produks.id');

        return $sales;
    }

    // Menampilkan Daftar Inventaris dengan Detail Produk dan Toko
    public function getInventories()
    {
        $inventories = DB::table('inventories')
            ->join('tokos', 'inventories.id_toko', '=', 'tokos.id')
            ->join('produks', 'inventories.id_produk', '=', 'produks.id');

        return $inventories;
    }

    // Menampilkan Daftar Retur Penjualan dengan Detail Produk dan Toko
    public function getReturns()
    {
        $returns = DB::table('penjualan_returns')
            ->join('tokos', 'penjualan_returns.id_toko', '=', 'tokos.id')
            ->join('produks', 'penjualan_returns.id_produk', '=', 'produks.id');

        return $returns;
    }

    // Menampilkan Daftar Pengguna dengan Role dan Toko yang Dikelola
    public function getUsers()
    {
        $users = DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.id_user')
            ->join('roles', 'user_roles.id_role', '=', 'roles.id')
            ->join('user_tokos', 'users.id', '=', 'user_tokos.id_user')
            ->join('tokos', 'user_tokos.id_toko', '=', 'tokos.id');

        return $users;
    }

    // Menampilkan Daftar Struk dengan Detail Inventaris
    public function getReceipts()
    {
        $receipts = DB::table('struks')
            ->join('tokos', 'struks.id_toko', '=', 'tokos.id')
            ->join('struk_inventories', 'struks.id_struk', '=', 'struk_inventories.id_struk')
            ->join('produks', 'struk_inventories.id_produk', '=', 'produks.id');

        return $receipts;
    }

    // Menampilkan Daftar Produk yang Dijual dalam Penjualan Tertentu
    public function getSaleDetails($id_jual)
    {
        $saleDetails = DB::table('penjualans')
            ->join('penjualan_produks', 'penjualans.id_jual', '=', 'penjualan_produks.id')
            ->join('produks', 'penjualan_produks.id_produk', '=', 'produks.id')
            ->where('penjualans.id_jual', $id_jual);

        return $saleDetails;
    }


}
