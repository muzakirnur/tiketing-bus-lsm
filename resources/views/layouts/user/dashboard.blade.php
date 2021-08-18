@extends('layouts.admin.admin')

@section('abody')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard User</div>
 
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    <p><strong>Selamat datang !</strong> Anda telah melakukan login sebagai</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection