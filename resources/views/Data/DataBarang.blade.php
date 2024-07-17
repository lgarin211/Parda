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
                                @foreach ($dataBarang as $i => $item)
                                    {{-- @dd($item) --}}
                                    <tr>
                                        <th scope="row">{{ $i + 1 }}</th>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->stock_purchased }}</td>
                                        <td>{{ $item->unit }}</td>
                                        <td>{{ $item->product_price }}</td>
                                        <td>{{ $item->product_price * $item->stock_purchased }}</td>
                                        <td>
                                            @if ($item->initialization == 'In' && $item->stock_available > 0)
                                                <span class="btn btn-success">Ready</span>
                                            @elseif ($item->initialization == 'In' && $item->stock_available == 0)
                                                <span class="btn btn-warning">Empty</span>
                                            @elseif ($item->initialization == 'Return')
                                                <span class="btn btn-danger">Return</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row">
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-1 mb-1">
                            <div class="row">
                                <div class="col-12 justify-content-center   ">
                                    {{ $dataBarang->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
