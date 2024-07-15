<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Barang Masuk</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="col-5 mb-2">
            <button type="button" class="btn btn-primary col-12" data-toggle="modal"
                data-target="#modalTambahBarang">Tambah Barang</button>
        </div>
        <div class="col-12">
            <ul class="list-group list-group-flush">
                <div class="row">
                    <table class="table col-12">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Stock Terkini</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="mt-1">
                            @foreach ($dataBarang as $i => $item)
                                <tr>
                                    <th scope="row">{{ $i + 1 }}</th>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->stock_tersedia }}</td>
                                    <td>{{ $item->satuan }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>
                                        <div class="row">
                                            <button class="btn btn-warning p-1">Edit</button>
                                            <button class="btn btn-danger p-2">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </ul>
        </div>
    </div>
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
