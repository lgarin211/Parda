@extends('Templates.LTELayout')
@section('content')
    <div class="card mt-5">
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
                <a href="#" class="btn btn-primary col-12" onclick="getsetprint()">Print</a>
            </div>
            <div class="col-12" id="datalist">
                <ul class="list-group list-group-flush">
                    <div class="row">
                        <table class="table col-12">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Jumlah Barang</th>
                                    <th scope="col">Harga </th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Sale Time</th>
                                </tr>
                            </thead>
                            <tbody class="mt-1">
                                @foreach ($laporan as $i => $item)
                                    {{-- @dd($item) --}}
                                    <tr>
                                        <th scope="row">{{ $i + 1 }}</th>
                                        <td>{{ $item->produk_nama }}</td>
                                        <td>{{ 1 }}</td>
                                        <td>{{ $item->produk_harga }}</td>
                                        <td>{{ $item->produk_harga * 1 }}</td>
                                        {{-- 2024-07-15 02:44:48 --}}
                                        <td>{{ // set in jam dan menit
                                            // date('H', strtotime($item->penjualan_tanggal)) - 7 . ':' . date('i', strtotime($item->penjualan_tanggal))
                                            date('H:i', strtotime($item->struk_tanggal)) }}
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
    <script>
        function getsetprint() {
            // print datalist to pdf
            var printContents = document.getElementById('datalist').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;

        }
    </script>
@endsection
