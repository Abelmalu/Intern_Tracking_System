@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-lg-2">
                <h1>Add Staff</h1>
            </div>
            <div class="col-lg-2">
                <p>Home / Staff / Add </p>
            </div>
        </div>
    </div>
@stop

@section('content')

    <div class="container-fluid">

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Staff Infromation</h3>
            </div>
            <div class="card-body">

                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <i class="icon fas fa-ban"></i>
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <i class="icon fas fa-check"></i>
                                        {{ session('success') }}
                                    </div>
                                @endif
                <div class="row justify-content-center">
                    <div class="col-md-5">

                        <form action="{{ route('staff.store')}}" method="POST">
                            @csrf

                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control mb-3" id="name" placeholder="Enterfull name" name="name">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control mb-3" type="email" name="email" placeholder="Enter Email">

                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control mb-3"
                                placeholder="Enter Password">
                            <div class="form-group">
                                <label>Confirm Password</label> <i class="text-danger font-weight-bold">*</i>
                                <input class="form-control mb-3" id="password_confirmation" placeholder="Confirm Password"
                                    type="password" name="password_confirmation">

                            </div>

                            <input type="submit" value="Register" class="btn btn-primary float-right">

                        </form>


                    </div>





                </div>
            </div>
        </div>

    </div>





@stop



@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
