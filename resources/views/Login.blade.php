@extends('Templates.Layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100dvh;">
            <div class="super card" style="height: 50dvh;width: 30dvw;">
                <div class="col-12 text-center">
                    <h1>Login</h1>
                </div>
                <form method="POST">
                    @csrf
                    <div class="row align-items-center justify-content-center">
                        {{-- input email --}}
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email"
                                    name="email">
                            </div>
                        </div>
                        {{-- input password --}}
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    name="password">
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
