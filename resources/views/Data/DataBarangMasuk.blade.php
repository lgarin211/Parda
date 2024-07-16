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
