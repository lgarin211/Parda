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
                <a href="#" class="btn btn-primary col-12">Tambah Barang</a>
            </div>
            <div class="col-12">
                <ul class="list-group list-group-flush">
                    <div class="row">
                        <table class="table col-12">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name Barang</th>
                                    <th scope="col">Jumlah Barang</th>
                                    <th scope="col">Satuans</th>
                                    <th scope="col">Harga </th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="mt-1">
                                @for ($i = 0; $i < 10; $i++)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ fake()->name }}</td>
                                        <td>{{ 'good' }}</td>
                                        <td>{{ 100 * $i }}</td>
                                        <td>{{ '20%' }}</td>
                                        <td>{{ 0 }}</td>
                                        <td>{{ '20%' }}</td>
                                        <td>
                                            <div class="row">
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </ul>
            </div>
        </div>
    </div>
