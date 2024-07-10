@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-2">
                <h1>Add Programs</h1>
            </div>
            <div class="col-2">
                <p>Home / Program / Add</p>
            </div>
        </div>

    </div>

@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <p>Program Information</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <form action="{{ route('program.store') }}" method="POST">
                                    @csrf

                                    <label for="name" class="label-form">Program Name</label>
                                    <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Enter program name">

                                    <label for="description" class="label-form">Description</label>
                                    <textarea name="description" id="description" class="form-control mb-3" placeholder="Enter program description"></textarea>

                                    <input type="submit" value="Register" class="float-right btn btn-primary">
                                </form>

                            </div>
                        </div>



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
