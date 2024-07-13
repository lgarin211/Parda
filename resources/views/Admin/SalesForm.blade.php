@extends('Templates.LTELayout')
@section('content')
    <style>
        .custom-card {
            background-color: #d3d3d3;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
        }

        .custom-card input,
        .custom-card textarea {
            margin-bottom: 15px;
        }

        .custom-file-input {
            height: 100px;
        }
    </style>
    <div class="container mt-5">
        <div class="custom-card">
            <div class="mb-3">
                <label for="sales" class="form-label">SALES</label>
                <input type="text" class="form-control" id="sales">
            </div>
            <div class="row">
                <div class="col">
                    <label for="tglMasuk" class="form-label">TGL MASUK</label>
                    <input type="date" class="form-control" id="tglMasuk">
                </div>
                <div class="col">
                    <label for="statusPembayaran" class="form-label">Status Pembayaran</label>
                    <input type="text" class="form-control" id="statusPembayaran">
                </div>
                <div class="col">
                    <label for="jatuhTempo" class="form-label">Jatuh Tempo</label>
                    <input type="date" class="form-control" id="jatuhTempo">
                </div>
            </div>
            <div class="mt-3">
                <label for="namaBarang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="namaBarang">
            </div>
            <div class="row">
                <div class="col">
                    <label for="jumlahBarang" class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control" id="jumlahBarang">
                </div>
                <div class="col">
                    <label for="satuan" class="form-label">Satuan</label>
                    <input type="text" class="form-control" id="satuan">
                </div>
                <div class="col">
                    <label for="hargaBarang" class="form-label">Harga Barang</label>
                    <input type="number" class="form-control" id="hargaBarang">
                </div>
            </div>
            <div class="mt-3">
                <label for="photoBarang" class="form-label">Photo Barang</label>
                <input type="file" class="form-control custom-file-input" id="photoBarang">
            </div>
            <button class="btn btn-primary mt-3">SIMPAN</button>
        </div>
    </div>
@endsection
