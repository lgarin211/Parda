<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class AuthPoinController extends Controller
{
    public static $data;

    public function __construct()
    {
        self::$data = new DataController();
    }

    public function SalesForm() {
        return view('Admin.SalesForm');
    }

    public function OwnerForm() {
        return view('Admin.OwnerForm');
    }

    public function Laporan(Request $request) {
        $tanggalTerdesia=[];
        $totalpemasukanHrian=[];
        if($request->month)
        {
            $month= date('m', strtotime($request->month));
            $laporan=self::$data->PenjualanData()->where('toko_id',session('user')->id_toko)->whereMonth(
                'penjualan_tanggal', $month
                )->get();
            $totaal=0;
            foreach ($laporan as $key => $value) {
                $tanggalTerdesia[]=$value->penjualan_tanggal;
            }
            $tanggalTerdesia=array_unique($tanggalTerdesia);

            // dd($laporan,$tanggalTerdesia);
            return view('Owener.Laporan',compact('laporan','tanggalTerdesia','totalpemasukanHrian'));
        }else{
            $laporan=self::$data->PenjualanData()->where('toko_id',session('user')->id_toko)->get();
        }

        return view('Owener.Laporan',compact('laporan','tanggalTerdesia','totalBesa','totalpemasukanHrian'));
    }

    public function DetailLaporan(Request $request) {
        if($request->tgl){
            $laporan=self::$data->PenjualanData()->where('toko_id',session('user')->id_toko)->where('penjualan_tanggal',$request->tgl)->get();
            // dd($laporan);
            return view('Owener.LaporanDetail',compact('laporan'));
        }
        return view('Owener.LaporanDetail');
    }

    public function LoginViewPoin(Request $request) {
        if ($request->isMethod('post')) {
            $data = self::$data->getUser()->where('users.email', $request->email)->first();
            if(Hash::check($request->password, $data->password)){
                session(['user' => $data]);
                return redirect()->route('BarangMasuk');
            }else{
                return redirect()->back();
            }
        }
        return view('Login');
    }

    public function RegisterViewPoin() {
        return view('Register');
    }

    public function BarangMasuk() {
        $dataBarang=self::$data->getInventories()->where('id_toko',session('user')->id_toko)->paginate(5);
        return view('Admin.BarangMasuk', compact('dataBarang'));
    }

    public function Barang() {
        $dataBarang=self::$data->getInventories()->where('id_toko',session('user')->id_toko)->paginate(5);
        return view('Admin.Barang', compact('dataBarang'));
    }

    public function OwnerAccess() {
        return view('Admin.OwenerAccess');
    }

    public function kasir(Request $request) {
        $dsv=[];

        if ($request->isMethod('post')) {

            $req=[
                'id_toko'=>session('user')->id_toko,
                'nama_produk'=>$request->name,
            ];
            $barang=self::$data->getInventories()->where($req)->first();
            // dd($barang);
            if($barang){
                $pw=(session('barang'))?session('barang'):[];
                $barang->jumlah=$request->qty;
                $barang->disc=$request->dis;
                $barang->pricetotal=$barang->harga*$request->qty+($barang->harga*$request->qty*($request->dis/100));
                $barang->condition=$request->qua;
                $pw[]=$barang;
                session()->forget('barang');
                session(['barang'=>$pw]);
                $dsv=session('barang');
            }
            // dump($dsv);
            return view('Admin.Kasir',compact('dsv'));
        }else if($request->locup==1){
            session()->forget('barang');
        }
        return view('Admin.Kasir',compact('dsv'));
    }

    public function Datalist() {
        dd(self::$data->getSales()->get());
        return view('Admin.Datalist');
    }
}
