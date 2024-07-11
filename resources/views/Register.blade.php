@extends('Templates.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100dvh;">
            <div class="super card" style="height: auto;width: 30dvw;">
                <div class="col-12 text-center">
                    <h1>Register</h1>
                </div>
                <form action="">
                    <div class="row align-items-center justify-content-center">
                        {{-- input Nama --}}
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama">
                            </div>
                        </div>

                        {{-- input email --}}
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        {{-- input password --}}
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>

                        {{-- textarea Nama Toko --}}
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label for="nama_toko">Nama Toko</label>
                                <textarea class="form-control" id="nama_toko" rows="3"></textarea>
                            </div>
                        </div>

                        {{-- button login --}}
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary col-12">Login</button>
                            </div>
                        </div>

                        {{-- forget pasword --}}
                        <div class="col-6 mt-4">
                            <h4>
                                <a href="">
                                    Forget Password?
                                </a>
                            </h4>
                        </div>

                        {{-- Registrasi --}}
                        <div class="col-6 mt-4">
                            <h4>
                                <a href="">
                                    Registrasi
                                </a>
                            </h4>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
