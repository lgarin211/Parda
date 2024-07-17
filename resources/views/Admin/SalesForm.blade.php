@extends('Templates.InventLayout')

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Barang Masuk</h1>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="container mt-5 card">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @if ($d)
                    @method('PUT')
                    <div class="mb-3">
                        <label for="sales" class="form-label">SALES</label>
                        <input type="text" class="form-control" id="sales" name="sales"
                            value="{{ session('user')->nama_pengguna }}" readonly>
                        <input type="hidden" name="id_pengguna" value="{{ session('user')->id_pengguna }}">
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="tglMasuk" class="form-label">TGL MASUK</label>
                            <input type="date" class="form-control" id="tglMasuk" name="tglMasuk"
                                value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col">
                            <label for="statusPembayaran" class="form-label">Status Pembayaran</label>
                            <input type="text" class="form-control" id="statusPembayaran" name="statusPembayaran"
                                value="Lunas">
                        </div>
                        <div class="col">
                            <label for="jatuhTempo" class="form-label">Jatuh Tempo</label>
                            <input type="date" class="form-control" id="jatuhTempo" name="jatuhTempo"
                                value="{{ date('Y-m-d', strtotime(date('Y-m-d') . ' + 7 days')) }}">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="namaBarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="namaBarang" name="namaBarang"
                            value="{{ $d->product_name }}">
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="jumlahBarang" class="form-label">Jumlah Barang</label>
                            <input type="number" class="form-control" id="jumlahBarang" name="jumlahBarang"
                                value="{{ $d->stock_available }}">
                        </div>
                        <div class="col">
                            <label for="satuan" class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="satuan" name="satuan"
                                value="{{ $d->unit }}">
                        </div>
                        <div class="col">
                            <label for="hargaBarang" class="form-label">Harga Barang</label>
                            <input type="number" class="form-control" id="hargaBarang" name="hargaBarang"
                                value="{{ $d->price }}">
                        </div>
                    </div>
                @else
                    <div class="mb-3">
                        <label for="sales" class="form-label">SALES</label>
                        <input type="text" class="form-control" id="sales" name="sales"
                            value="{{ session('user')->nama_pengguna }}" readonly>
                        <input type="hidden" name="id_pengguna" value="{{ session('user')->id_pengguna }}">
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="tglMasuk" class="form-label">TGL MASUK</label>
                            <input type="date" class="form-control" id="tglMasuk" name="tglMasuk"
                                value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col">
                            <label for="statusPembayaran" class="form-label">Status Pembayaran</label>
                            <input type="text" class="form-control" id="statusPembayaran" name="statusPembayaran"
                                value="Lunas">
                        </div>
                        <div class="col">
                            <label for="jatuhTempo" class="form-label">Jatuh Tempo</label>
                            <input type="date" class="form-control" id="jatuhTempo" name="jatuhTempo"
                                value="{{ date('Y-m-d', strtotime(date('Y-m-d') . ' + 7 days')) }}">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="namaBarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="namaBarang" name="namaBarang">
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="jumlahBarang" class="form-label">Jumlah Barang</label>
                            <input type="number" class="form-control" id="jumlahBarang" name="jumlahBarang">
                        </div>
                        <div class="col">
                            <label for="satuan" class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="satuan" name="satuan">
                        </div>
                        <div class="col">
                            <label for="hargaBarang" class="form-label">Harga Barang</label>
                            <input type="number" class="form-control" id="hargaBarang" name="hargaBarang">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="photoBarang" class="form-label">Photo Barang</label>
                        <input type="file" class="form-control col-12" id="photoBarang" name="photoBarang">
                    </div>
                @endif
                <button class="btn btn-primary mt-3">SIMPAN</button>
            </div>
        </form>
    </div>
@endsection
