!
@extends('Templates.LTELayout')

@section('header')
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
    <div class="container mt-5 card">
        <div class="card-body">
            <div class="col-12">
                <h4>Select Month</h4>
                <select name="" class="form-control col-12" id="">
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                </select>
            </div>
            <div class="col-12 mt-2">
                <div class="row">
                    @for ($i = 1; $i <= 31; $i++)
                        <div class="col-4">
                            <div class="card col-12">
                                <div class="card-body">
                                    <h5 class="card-title">Day {{ $i }}</h5>
                                    <p class="card-text">sles poin in day 1 is $</p>
                                    <a href="#" class="card-link">Employe</a>
                                    <a href="#" class="card-link btn btn-primary">See Detail</a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
