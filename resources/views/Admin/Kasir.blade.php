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
                        <div class="row">
                            <div class="col-12 mt-2">
                                <input type="text" class="col-12 form-control" placeholder="Enter Item Name">
                            </div>
                            <div class="col-12 mt-2">
                                <input type="text" class="col-12 form-control" placeholder="Enter Item Quality">
                            </div>
                            <div class="col-12 mt-2">
                                <input type="text" class="col-12 form-control" placeholder="Enter Item Price">
                            </div>
                            <div class="col-12 mt-2">
                                <input type="text" class="col-12 form-control" placeholder="Enter Item Discount(%)">
                            </div>
                            <div class="col-12 mt-2">
                                <input type="text" readonly class="col-12 form-control" placeholder="Total">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary col-12 mt-2">Submit</button>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-danger col-12 mt-2">Cancel</button>
                            </div>
                        </div>
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
                        <div class="row">
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
                                    @for ($i = 0; $i < 10; $i++)
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ fake()->word(4) }}</td>
                                            <td>{{ 'good' }}</td>
                                            <td>{{ 100 * $i }}</td>
                                            <td>{{ '20%' }}</td>
                                            <td>{{ 0 }}</td>
                                            <td>
                                                <div class="row">
                                                    <button class="btn btn-warning" data-toggle="modal"
                                                        data-target="#CardSummeryPoin{{ $i }}">Edit</button>
                                                    <button class="btn btn-danger">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            <button class="btn btn-primary col-12" data-toggle="modal" data-target="#ModalTagPoinofCekhout">
                                Chekout
                            </button>
                        </div>
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
