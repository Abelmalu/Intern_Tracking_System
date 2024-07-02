@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add program</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">program</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@stop

@section('content')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-ban"></i>
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-check"></i>
                {{ session('success') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title">program information</div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="{{ route('program.update', $program) }}" method="POST">
                                @csrf
                                @method('PUT')



                                <label for="name" class="form-label">program Name</label>
                                <input type="text" class="form-control mb-3" placeholder="program Name" name="name"
                                    value="{{ $program->name }}">


                                <label for="description" class="form-label"> Description</label>
                                <textarea type="text" class="form-control mb-3" placeholder="Description" name="description">
                                    {{ $program->description }}
                            </textarea>

                                <input type="submit" value="Update" class="float-right btn btn-primary">


                            </form>
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
