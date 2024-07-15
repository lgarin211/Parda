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
                <select name="" class="form-control col-12"
                    onchange="
                        window.location.href = '{{ url('/Laporan') }}' + '?month=' + this.value
                    ">
                    {{-- scrip option jaruary until desember --}}
                    @php
                        $month = [
                            'January',
                            'February',
                            'March',
                            'April',
                            'May',
                            'June',
                            'July',
                            'August',
                            'September',
                            'October',
                            'November',
                            'December',
                        ];
                    @endphp
                    @foreach ($month as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-2">
                <div class="row" style="max-height: 50dvh;overflow: scroll;">
                    @foreach ($tanggalTerdesia as $i => $item)
                        <div class="col-4">
                            <div class="card col-12">
                                <div class="card-body">
                                    <h5 class="card-title">Day {{ $i + 1 }}</h5>
                                    <p class="card-text">sales poin in day {{ $i + 1 }} </p>
                                    <a href="#" class="card-link">{{ $laporan[$i]->toko_nama }}</a>
                                    <a href="{{ url('/DetailLaporan') }}?tgl={{ $laporan[$i]->penjualan_tanggal }}"
                                        class="card-link btn btn-primary">See Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
