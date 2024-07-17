<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatasetController extends Controller
{
    // Functions for nusers table
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:nusers,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:customer,employee,owner',
        ]);

        $user = DB::table('nusers')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $user;
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:nusers,email,' . $id,
            'password' => 'string|min:8',
            'role' => 'string|in:customer,employee,owner',
        ]);

        DB::table('nusers')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
                'updated_at' => now(),
            ]);

        return $id;
    }

    public function deleteUser($id)
    {
        DB::table('nusers')->where('id', $id)->update(['sofdelete'=>1]);

        return 'User with ID ' . $id . ' deleted successfully';
    }

    // Functions for nproducts table
    public function storeProduct(Request $request)
    {

        $req=[
            'nama_barang' => $request->namaBarang,
            'tersedia' => $request->jumlahBarang,
            'harga' => $request->hargaBarang,
            'satuan' => $request->satuan,
            'images' => $request->photoBarang,
            'id_user' => session('user')->id_pengguna,
        ];
        $request->merge($req);
        // $request->validate([
        //     'nama_barang' => 'required|string|max:255',
        //     'tersedia' => 'required|integer',
        //     'harga' => 'required|numeric',
        //     'satuan' => 'required|string|max:255',
        //     'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);



        if ($request->hasFile('photoBarang')) {
            $fileNameWithExt = $request->file('photoBarang')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photoBarang')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('photoBarang')->move(public_path('photoBarang'), $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $product = DB::table('nproducts')->insertGetId([
            'id_owner' => session('user')->id_pemilik,
            'nama_barang' => $request->nama_barang,
            'tersedia' => $request->tersedia,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'images' => $fileNameToStore,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $request->merge(['id_produk' => $product]);
        $purchase = $this->storePurchase($request);
        // join $product and $purchase
        $product = [
            'product' => $product,
            'purchase' => $purchase,
        ];
        // dd($product);
        return $product;
    }


    public function updateProduct(Request $request, $id)
    {
        DB::table('nproducts')
            ->where('id', $id)
            ->update([
                'nama_barang' => $request->namaBarang,
                'tersedia' => $request->jumlahBarang,
                'harga' => $request->hargaBarang,
                'satuan' => $request->satuan,
                'updated_at' => now(),
            ]);
        $this->updatePurchase($request, $id);
        return $id;
    }

    public function deleteProduct($id)
    {
        DB::table('nproducts')->where('id', $id)->update(['sofdelete'=>1]);
        $this->deletePurchase($id);
        $this->deleteSale($id);
        $this->deleteCartItem($id);
        return 'Product with ID ' . $id . ' deleted successfully';
    }

    // Functions for npurchases table
    public function storePurchase(Request $request)
    {
        $purchase = DB::table('npurchases')->insertGetId([
            'id_produk' => $request->id_produk,
            'id_user' => $request->id_user,
            'inisialisasi' => "In",
            'status_pembayaran' => $request->statusPembayaran,
            'jumlah_stok' => $request->jumlahBarang,
            'jatuh_tempo' => $request->jatuhTempo,
            'total_harga' => $request->jumlahBarang * $request->harga,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return $purchase;
    }

    public function updatePurchase(Request $request, $id)
    {
        $tag=($request->jumlahBarang==0)?"Return":"In";
        DB::table('npurchases')
        ->where('id_produk', $id)
        ->update([
            'status_pembayaran' => $request->statusPembayaran,
            'jumlah_stok' => $request->jumlahBarang,
            'jatuh_tempo' => $request->jatuhTempo,
            'total_harga' => $request->jumlahBarang * $request->hargaBarang,
            'updated_at' => now(),
            'inisialisasi' => $tag,
        ]);

        return $id;
    }

    public function deletePurchase($id)
    {
        DB::table('npurchases')->where('id_produk', $id)->update(['sofdelete'=>1]);

        return 'Purchase with ID ' . $id . ' deleted successfully';
    }

    // Functions for nsales table
    public function storeSale(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|integer|exists:nproducts,id',
            'id_user' => 'required|integer|exists:nusers,id',
            'total_harga_bersih' => 'required|numeric',
        ]);

        $sale = DB::table('nsales')->insertGetId([
            'id_produk' => $request->id_produk,
            'id_user' => $request->id_user,
            'total_harga_bersih' => $request->total_harga_bersih,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $sale;
    }

    public function updateSale(Request $request, $id)
    {
        $request->validate([
            'id_produk' => 'integer|exists:nproducts,id',
            'id_user' => 'integer|exists:nusers,id',
            'total_harga_bersih' => 'numeric',
        ]);

        DB::table('nsales')
            ->where('id', $id)
            ->update([
                'id_produk' => $request->id_produk,
                'id_user' => $request->id_user,
                'total_harga_bersih' => $request->total_harga_bersih,
                'updated_at' => now(),
            ]);

        return $id;
    }

    public function deleteSale($id)
    {
        DB::table('nsales')->where('id_produk', $id)->update(['sofdelete'=>1]);

        return 'Sale with ID ' . $id . ' deleted successfully';
    }

    // Functions for ncart_items table
    public function storeCartItem(Request $request)
    {
        $request->validate([
            'id_penjualan' => 'required|integer|exists:nsales,id',
            'id_user' => 'required|integer|exists:nusers,id',
            'quantity' => 'required|integer',
            'total_harga' => 'required|numeric',
            'quality' => 'required|string|max:255',
            'diskon' => 'required|numeric',
        ]);

        $cartItem = DB::table('ncart_items')->insertGetId([
            'id_penjualan' => $request->id_penjualan,
            'id_user' => $request->id_user,
            'quantity' => $request->quantity,
            'total_harga' => $request->total_harga,
            'quality' => $request->quality,
            'diskon' => $request->diskon,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $cartItem;
    }

    public function updateCartItem(Request $request, $id)
    {
        $request->validate([
            'id_penjualan' => 'integer|exists:nsales,id',
            'id_user' => 'integer|exists:nusers,id',
            'quantity' => 'integer',
            'total_harga' => 'numeric',
            'quality' => 'string|max:255',
            'diskon' => 'numeric',
        ]);

        DB::table('ncart_items')
            ->where('id', $id)
            ->update([
                'id_penjualan' => $request->id_penjualan,
                'id_user' => $request->id_user,
                'quantity' => $request->quantity,
                'total_harga' => $request->total_harga,
                'quality' => $request->quality,
                'diskon' => $request->diskon,
                'updated_at' => now(),
            ]);

        return $id;
    }

    public function deleteCartItem($id)
    {
        DB::table('ncart_items')->where('id', $id)->update(['sofdelete'=>1]);

        return 'Cart item with ID ' . $id . ' deleted successfully';
    }

    // Functions for nemployees table
    public function storeEmployee(Request $request)
    {
        $request->validate([
            'nama_karayawan' => 'required|string|max:255',
            'inisialisasi' => 'required|string|max:255',
            'images' => 'required|string|max:255',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $employee = DB::table('nemployees')->insertGetId([
            'nama_karayawan' => $request->nama_karayawan,
            'inisialisasi' => $request->inisialisasi,
            'images' => $request->images,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $employee;
    }

    public function updateEmployee(Request $request, $id)
    {
        $request->validate([
            'nama_karayawan' => 'string|max:255',
            'inisialisasi' => 'string|max:255',
            'images' => 'string|max:255',
        ]);

        DB::table('nemployees')
            ->where('id', $id)
            ->update([
                'nama_karayawan' => $request->nama_karayawan,
                'inisialisasi' => $request->inisialisasi,
                'images' => $request->images,
                'updated_at' => now(),
            ]);

        return $id;
    }

    public function deleteEmployee($id)
    {
        DB::table('nemployees')->where('id', $id)->update(['sofdelete'=>1]);

        return 'Employee with ID ' . $id . ' deleted successfully';
    }

    // Functions for nowners table
    public function storeOwner(Request $request)
    {
        $request->validate([
            'nama_pemilik' => 'required|string|max:255',
            'inisialisasi' => 'required|string|max:255',
            'images' => 'required|string|max:255',
        ]);

        $owner = DB::table('nowners')->insertGetId([
            'nama_pemilik' => $request->nama_pemilik,
            'inisialisasi' => $request->inisialisasi,
            'images' => $request->images,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $owner;
    }

    public function updateOwner(Request $request, $id)
    {
        $request->validate([
            'nama_pemilik' => 'string|max:255',
            'inisialisasi' => 'string|max:255',
            'images' => 'string|max:255',
        ]);

        DB::table('nowners')
            ->where('id', $id)
            ->update([
                'nama_pemilik' => $request->nama_pemilik,
                'inisialisasi' => $request->inisialisasi,
                'images' => $request->images,
                'updated_at' => now(),
            ]);

        return $id;
    }

    public function deleteOwner($id)
    {
        DB::table('nowners')->where('id', $id)->update(['sofdelete'=>1]);

        return 'Owner with ID ' . $id . ' deleted successfully';
    }
}
