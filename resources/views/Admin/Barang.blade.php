@extends('Templates.InventLayout')
@section('header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang </h1>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('content')
    <section class="content">
        @include('Data.DataBarang')
    </section>
@endsection
