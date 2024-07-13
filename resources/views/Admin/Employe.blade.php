@extends('Templates.InventLayout')
@section('content')
    <div class="card col-12">
        <div class="card-header">
            Add Employe
        </div>
        <ul class="list-group list-group-flush">
            <div class="row">
                <div class="col-12 mt-2">
                    <input type="text" class="col-12 form-control" placeholder="Input Employer Name">
                </div>
                <div class="col-12 mt-2">
                    <input type="password" class="col-12 form-control" placeholder="Input Employer password">
                </div>
            </div>
        </ul>
    </div>

    <div class="card col-12 mt-4">
        <div class="card-header">
            Employer List
        </div>
        <ul class="list-group list-group-flush">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">no</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="mt-1">
                        @for ($i = 0; $i < 10; $i++)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ fake()->name }}</td>
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
@endsection
