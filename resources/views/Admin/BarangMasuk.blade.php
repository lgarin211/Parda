@extends('Templates.LTELayout')
@section('header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang Masuk</h1>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('content')
    {{-- @include('Data.DataOwner') --}}
    <section class="content">
        @include('Data.DataBarangMasuk')
    </section>
@endsection
