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
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Owner</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <h3>
                        Add Employe
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
                                <input type="text" readonly class="col-12 form-control" placeholder="TOtal">
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

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Summery</h3>
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



    </section>
@endsection
