@extends('Templates.LTELayout')
@section('header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang Masuk</h1>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('content')
    {{-- @include('Data.DataOwner') --}}
    <section class="content">
        @include('Data.DataBarangMasuk')
    </section>
@endsection

@section('content2')
    <div class="row">
        <form method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="namaProduk">Nama Barang</label>
                    <input name="NamaBarang" type="text" class="form-control" id="namaProduk"
                        placeholder="Masukkan Nama Barang">
                </div>
                <div class="form-group">
                    <label for="stockTersedia">Stock Tersedia</label>
                    <input name="Stock" type="number" class="form-control" id="stockTersedia"
                        placeholder="Masukkan Stock Tersedia">
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <input name="satuan" type="text" class="form-control" id="satuan" placeholder="Masukkan Satuan">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input name="harga" type="number" class="form-control" id="harga" placeholder="Masukkan Harga">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>


    <!-- Modal Tambah Barang -->
    <div class="modal fade" id="modalTambahBarang" tabindex="-1" role="dialog" aria-labelledby="modalTambahBarangLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahBarangLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namaProduk">Nama Barang</label>
                            <input name="NamaBarang" type="text" class="form-control" id="namaProduk"
                                placeholder="Masukkan Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="stockTersedia">Stock Tersedia</label>
                            <input name="Stock" type="number" class="form-control" id="stockTersedia"
                                placeholder="Masukkan Stock Tersedia">
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input name="satuan" type="text" class="form-control" id="satuan"
                                placeholder="Masukkan Satuan">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input name="harga" type="number" class="form-control" id="harga"
                                placeholder="Masukkan Harga">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
