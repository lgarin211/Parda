<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\DatasetController as DC;
use Illuminate\Routing\Route;
use PhpParser\Node\Stmt\Return_;

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
                session(['user' => $ndata]);
                return redirect()->route('BarangMasuk');
            }else{
                return redirect()->back();
            }
        }
        return view('Login');
    }

    public function BarangMasuk(Request $request, $id=null) {
        $dc= new DC();
        if ($request->isMethod('post')) {
            $dc->storeProduct($request);
            return redirect()->route('BarangMasuk');
        }
        if ($request->isMethod('delete')) {
            // dd($request->all());
            $id=$request->newl;
            $dc->deleteProduct($id);
        }
        if ($request->isMethod('put')) {
            $id=$request->newla;
            $dc->updateProduct($request, $id);
            return redirect()->route('BarangMasuk');
        }
        if (!empty($request->newla)) {
            $d=null;
            $barangmasuk=DB::table('npurchases')->where('id',$request->newla)->first();
            if($barangmasuk){
                $d=DB::table('detail_products')->where('id',$request->newla)->first();
            }
            return view('Admin.SalesForm', compact('d'));
        }

        $dataBarang=DB::table('detail_products')->where('id_ownertoko',session('user')->id_pemilik)->where('sofdelete',NULL)->paginate(5);
        return view('Admin.BarangMasuk', compact('dataBarang'));
    }

    public function Barang() {
        $dataBarang=DB::table('purchase_product_user_owner')->where('owner_id',session('user')->id_pemilik)->paginate(5);
        return view('Admin.Barang', compact('dataBarang'));
    }

    public function kasir(Request $request) {
        if($request->fil==1){
            session()->forget('barang');
        }

        if($request->isMethod('PUT')){
            $data=session('barang');
            $data[$request->tager]->jumlah=$request->qty;
            $data[$request->tager]->disc=$request->dis;
            $data[$request->tager]->pricetotal=$data[$request->tager]->price*$request->qty+($data[$request->tager]->price*$request->qty*($request->dis/100));
            $data[$request->tager]->condition=$request->qua;
            session()->forget('barang');
            session(['barang'=>$data]);
            $dsv=session('barang');
            return view('Employer.Kasir',compact('dsv'));
        }

        $dsv=[];
        if($request->sessionpot){
            $data=session('barang');
            unset($data[$request->sessionpot]);
            session()->forget('barang');
            session(['barang'=>$data]);
            $dsv=session('barang');
            return view('Employer.Kasir',compact('dsv'));
        }


        if ($request->isMethod('post')) {
            $req=[
                'id_ownertoko'=>session('user')->id_pemilik,
                'product_name'=>$request->name,
            ];
            $barang=DB::table('detail_products')->where($req)->first();
            // dd($barang);
            if($barang){
                $pw=(session('barang'))?session('barang'):[];
                $barang->jumlah=$request->qty;
                $barang->disc=$request->dis;
                $barang->pricetotal=$barang->price*$request->qty+($barang->price*$request->qty*($request->dis/100));
                $barang->condition=$request->qua;
                $pw[]=$barang;
                session()->forget('barang');
                session(['barang'=>$pw]);
                $dsv=session('barang');
            }

            return view('Employer.Kasir',compact('dsv'));
        }else if($request->locup==1){
            session()->forget('barang');
        }
        return view('Employer.Kasir',compact('dsv'));
    }


    public function OwnerAccess(Request $request) {
        $dataOwner=DB::table('all_data_owner')->get();
        if($request->isMethod('put')){
            // dd($request->all());
            $data1=[
                'name'=>$request->newOwnerName,
                'password'=>Hash::make($request->newPassword),
            ];
            $data2=[
                'nama_toko'=>$request->newShopName,
            ];

            $dataOwner=DB::table('nusers')->where('id',$request->id_pengguna)->update($data1);
            $toko=DB::table('nowners')->where('id_user',$request->id_pengguna)->update($data2);
            // dd($dataOwner,$toko);
            return redirect()->route('OwenerAccess');
        }

        if($request->id){
            $dataOwner=DB::table('all_data_owner')->where('id_pengguna',$request->id)->first();
            return view('Admin.OwnerForm', compact('dataOwner'));
        }

        return view('Admin.OwenerAccess', compact('dataOwner'));
    }

    // public function OwnerForm() {
    //     return view('Admin.OwnerForm');
    // }

    // public function SalesForm() {
    //     return view('Admin.SalesForm');
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







    // public function Datalist() {
    //     dd(self::$data->getSales()->get());
    //     return view('Admin.Datalist');
    // }
}
