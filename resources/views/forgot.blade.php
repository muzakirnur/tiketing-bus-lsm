@extends('layouts.main')

@section('body')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Lupa Password Kamu ?</h1>
                                    <p class="mb-4">Jangan Panik, Masukkan email kamu dibawah dan akan kami kirimkan sebuah kode verifikasi</p>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">
                                    </div>
                                    <a href="#" class="btn btn-primary btn-user btn-block">
                                        Reset Password
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="register">Create an Account!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="login">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection