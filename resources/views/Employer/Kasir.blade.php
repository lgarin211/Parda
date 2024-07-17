@extends('Templates.InventLayout')
@section('header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employe</h1>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('content')
    <section class="content row">

        <div class="col-6 card">
            <div class="card-header">
                <h3 class="card-title">Kasir</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <h3>
                        Sales Input Item
                    </h3>
                    <ul class="list-group list-group-flush">
                        <form method="POST" action="{{ route('kasir') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <input name="name" type="text" class="col-12 form-control"
                                        placeholder="Enter Item Name">
                                </div>
                                <div class="col-12 mt-2">
                                    <input name="qua" type="text" class="col-12 form-control"
                                        placeholder="Enter Item Quality" value="good">
                                </div>
                                <div class="col-12 mt-2">
                                    <input name="qty" type="text" class="col-12 form-control"
                                        placeholder="Enter Item Quantity" value="1">
                                </div>
                                <div class="col-12 mt-2">
                                    <input name="dis" value="0" type="number" class="col-12 form-control"
                                        placeholder="Enter Item Discount(%)">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary col-12 mt-2" type="submit">Submit</button>
                                </div>
                                <div class="col-12">
                                    <a class="btn btn-danger col-12 mt-2" href="{{ route('kasir') }}?locup=1">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-6 card">
            <div class="card-header">
                <h3 class="card-title">Card Summery</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-boddy">
                <div class="col-12">
                    <ul class="list-group list-group-flush">
                        <div class="row" style="height: 50dvh;overflow-y: scroll;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">no</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quality</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="mt-1">
                                    @if ($dsv)
                                        @foreach ($dsv as $i => $item)
                                            <tr>
                                                <th scope="row">{{ $i + 1 }}</th>
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->condition }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->disc }}%</td>
                                                <td>{{ $item->pricetotal }}</td>
                                                <td>
                                                    <div class="row">
                                                        <button class="btn btn-warning" data-toggle="modal"
                                                            data-target="#CardSummeryPoin{{ $i }}">Edit</button>
                                                        <a href="{{ route('kasir') }}?sessionpot={{ $i }}"
                                                            class="btn btn-danger">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-primary col-12 mt-1" data-toggle="modal"
                            data-target="#ModalTagPoinofCekhout">
                            Chekout
                        </button>
                    </ul>
                </div>
            </div>
        </div>



    </section>
@endsection


@section('content2')
    @foreach ($dsv as $i => $item)
        {{-- @dump($item) --}}
        <!-- Modal -->
        <div class="modal fade" id="CardSummeryPoin{{ $i }}" tabindex="-1"
            aria-labelledby="CardSummeryPoin{{ $i }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CardSummeryPoin{{ $i }}Label">{{ $i }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @php
                            $ilis = session('barang');
                            $ili = $ilis[$i];
                        @endphp
                        {{-- @dump($ili) --}}
                        <div class="card-body">
                            <div class="col-12">
                                <h3>
                                    Sales Input Item
                                </h3>
                                <ul class="list-group list-group-flush">
                                    <form method="POST" action="{{ route('kasir') }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="tager" value="{{ $i }}">
                                        <div class="row">
                                            <div class="col-12 mt-2">
                                                <label for="name">
                                                    Name Produk
                                                </label>
                                                <input name="name" type="text" class="col-12 form-control"
                                                    placeholder="Enter Item Name" value="{{ $ili->product_name }}"
                                                    readonly>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <label for="">
                                                    Quality
                                                </label>
                                                <input name="qua" type="text" class="col-12 form-control"
                                                    placeholder="Enter Item Quality" value="{{ $ili->condition }}">
                                            </div>
                                            <div class="col-12 mt-2">
                                                <label for="">
                                                    Quantity
                                                </label>
                                                <input name="qty" type="text" class="col-12 form-control"
                                                    placeholder="Enter Item Quantity" value="{{ $ili->jumlah }}">
                                            </div>
                                            <div class="col-12 mt-2">
                                                <label for="">
                                                    Discount
                                                </label>
                                                <input name="dis" value="0" type="number"
                                                    class="col-12 form-control" placeholder="Enter Item Discount(%)"
                                                    value="{{ $ili->disc }}">
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary col-12 mt-2" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <div class="modal fade" id="ModalTagPoinofCekhout" tabindex="-1" aria-labelledby="ModalTagPoinofCekhoutLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTagPoinofCekhoutLabel">Powerlist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">no</th>
                                <th scope="col">item</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $setlist = session('barang');
                                $total = 0;

                            @endphp
                            @if (!empty($setlist))
                                @foreach ($setlist as $i => $item)
                                    <tr>
                                        <th scope="row">{{ $i + 1 }}</th>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>RP. {{ $item->price }}</td>
                                        <td>{{ $item->pricetotal }}</td>
                                    </tr>
                                    @php
                                        $total += $item->pricetotal;
                                    @endphp
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="total">
                        <h4>
                            Total : RP. {{ $total }}
                        </h4>
                        <h4>
                            Tax (11%): RP. {{ $total * 0.11 }}
                        </h4>
                        <h4>
                            Discount : (5% if > 2.000.000); Rp {{ $total > 2000000 ? $total * 0.05 : $total }}
                        </h4>
                        <h3>
                            Final Total : RP. {{ $total + $total * 0.11 - ($total > 2000000 ? $total * 0.05 : 0) }}
                        </h3>

                        <a href="{{ route('kasir') }}?fil=1" class="col-12 btn btn-primary">Bayar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
