@extends('Templates.LTELayout')
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
                        <form method="POST">
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
                                                <th scope="row">{{ $i }}</th>
                                                <td>{{ $item->nama_produk }}</td>
                                                <td>{{ $item->condition }}</td>
                                                <td>{{ $item->harga }}</td>
                                                <td>{{ $item->disc }}%</td>
                                                <td>{{ $item->pricetotal }}</td>
                                                <td>
                                                    <div class="row">
                                                        <button class="btn btn-warning" data-toggle="modal"
                                                            data-target="#CardSummeryPoin{{ $i }}">Edit</button>
                                                        <button class="btn btn-danger">Delete</button>
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
    @for ($i = 0; $i < 10; $i++)
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
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    @endfor
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
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
