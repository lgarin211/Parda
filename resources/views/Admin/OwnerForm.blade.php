{{-- @extends('Templates.InventLayout') --}}
@extends('Templates.InventLayout')
@section('header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Owner</h1>
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
                    {{-- @dump($dataOwner) --}}
                    <div class="mb-3">
                        <label for="ownerName" class="form-label">Owner Name:</label>
                        <input type="text" class="form-control" id="ownerName" value="{{ $dataOwner->nama_pengguna }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="shopName" class="form-label">Shop Name:</label>
                        <input type="text" class="form-control" id="shopName" value="{{ $dataOwner->nama_toko }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" value="*******" readonly>
                    </div>
                    <h1>
                        <hr>
                    </h1>
                    <form method="POST" action="{{ route('OwenerAccess') }}">
                        @csrf
                        {{-- @dump($dataOwner) --}}
                        <input type="hidden" value="{{ $dataOwner->id_pengguna }}" name="id_pengguna">
                        <input type="hidden" value="{{ $dataOwner->id_pemilik }}" name="id_pemilik">
                        @method('PUT')
                        <div class="mb-3">
                            <label for="newOwnerName" class="form-label">New Owner Name:</label>
                            <input type="text" class="form-control" id="newOwnerName" name="newOwnerName"
                                placeholder="John Doe" value="{{ $dataOwner->nama_pengguna }}">
                        </div>
                        <div class="mb-3">
                            <label for="newShopName" class="form-label">New Shop Name:</label>
                            <input type="text" class="form-control" id="newShopName" name="newShopName"
                                placeholder="My Shop" value="{{ $dataOwner->nama_toko }}">
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password:</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
