<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\DatasetController as DC;

class AuthPoinController extends Controller
{
    public static $data;

    public function __construct()
    {
        self::$data = new DataController();
    }


    // Admin
    public function LoginViewPoin(Request $request) {
        $ndata=0;
        session()->forget('user');
        if ($request->isMethod('post')) {
            $data = DB::table('nusers')->where('email', $request->email)->first();
            if(Hash::check($request->password, $data->password)){
                if($data->role=='owner'){
                    $ndata=DB::table('all_data_employee')->where('id_pengguna',$data->id)->first();
                    // return redirect()->route('OwnerAccess');
                }else{
                    $ndata=DB::table('all_data_employee')->where('id_pengguna',$data->id)->first();
                }
                // dd($ndata);
                session(['user' => $ndata]);
                return redirect()->route('BarangMasuk');
            }else{
                dd("Password Salah");
                return redirect()->back();
            }
        }else{
            // Dd("Method Salah");
        }
        return view('Login');
    }

    public function BarangMasuk(Request $request) {
        $dataBarang=DB::table('detail_products')->where('id_ownertoko',session('user')->id_pemilik)->paginate(5);
        return view('Admin.BarangMasuk', compact('dataBarang'));
    }

    public function Barang() {
        $dataBarang=DB::table('purchase_product_user_owner')->where('owner_id',session('user')->id_pemilik)->paginate(5);
        // dd($dataBarang);
        return view('Admin.Barang', compact('dataBarang'));
    }

    // public function SalesForm() {
    //     return view('Admin.SalesForm');
    // }

    // public function OwnerForm() {
    //     return view('Admin.OwnerForm');
    // }

    // public function Laporan(Request $request) {
    //     $tanggalTerdesia=[];
    //     $totalpemasukanHrian=[];
    //     if($request->month)
    //     {
    //         $month= date('m', strtotime($request->month));
    //         $laporan=self::$data->PenjualanData()->whereMonth(
    //             'penjualan_tanggal', $month
    //             )->get();
    //         $totaal=0;
    //         // dd($laporan);
    //         foreach ($laporan as $key => $value) {
    //             $tanggalTerdesia[]=$value->penjualan_tanggal;
    //         }
    //         $tanggalTerdesia=array_unique($tanggalTerdesia);

    //         // dd($laporan,$tanggalTerdesia);
    //         return view('Owener.Laporan',compact('laporan','tanggalTerdesia','totalpemasukanHrian'));
    //     }else{
    //         $laporan=self::$data->PenjualanData()->where('toko_id',session('user')->id_toko)->get();
    //     }

    //     return view('Owener.Laporan',compact('laporan','tanggalTerdesia','totalpemasukanHrian'));
    // }

    // public function DetailLaporan(Request $request) {
    //     if($request->tgl){
    //         $laporan=self::$data->PenjualanData()->where('penjualan_tanggal',$request->tgl)->get();
    //         // dd($laporan);
    //         return view('Owener.LaporanDetail',compact('laporan'));
    //     }
    //     return view('Owener.LaporanDetail');
    // }



    // public function RegisterViewPoin() {
    //     return view('Register');
    // }





    // public function OwnerAccess() {
    //     return view('Admin.OwenerAccess');
    // }

    // public function kasir(Request $request) {
    //     $dsv=[];

    //     if ($request->isMethod('post')) {

    //         $req=[
    //             'id_toko'=>session('user')->id_toko,
    //             'nama_produk'=>$request->name,
    //         ];
    //         $barang=self::$data->getInventories()->where($req)->first();
    //         // dd($barang);
    //         if($barang){
    //             $pw=(session('barang'))?session('barang'):[];
    //             $barang->jumlah=$request->qty;
    //             $barang->disc=$request->dis;
    //             $barang->pricetotal=$barang->harga*$request->qty+($barang->harga*$request->qty*($request->dis/100));
    //             $barang->condition=$request->qua;
    //             $pw[]=$barang;
    //             session()->forget('barang');
    //             session(['barang'=>$pw]);
    //             $dsv=session('barang');
    //         }
    //         // dump($dsv);
    //         return view('Admin.Kasir',compact('dsv'));
    //     }else if($request->locup==1){
    //         session()->forget('barang');
    //     }
    //     return view('Admin.Kasir',compact('dsv'));
    // }

    // public function Datalist() {
    //     dd(self::$data->getSales()->get());
    //     return view('Admin.Datalist');
    // }
}
