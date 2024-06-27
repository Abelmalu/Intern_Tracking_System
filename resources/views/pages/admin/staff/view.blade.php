@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-lg-2">
                <h1>Add Staff</h1>
            </div>
            <div class="col-lg-2">
                <p>Home / Staff / List / Detail </p>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container-lg">
        <div class="row ">
            <div class="col">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="row justify-content-between">

                            <div class="col-2">
                                <div class="card-title">Staff Detail</div>

                            </div>

                            <div class="col-2">
                                <a href="{{ route('staff.index') }}">Back</a>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-body">
                    <h5>Account Information: </h5>
                    name:<p>{{ $staff->name }}</p>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam quam provident architecto numquam
                    corrupti alias exercitationem illum eos ea delectus!</p>
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
