

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
     <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Program</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Program</li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')
    <div class="container">
        <form method="POST" class="form-control" action="{{ route('school.store') }}">
            @csrf

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
            <label for="name">School Name</label>

            @error('name')
            <span class="text-danger" role="alert">
                  {{ $message }}
            </span>
             @enderror

            <input type="text" name="name" ><br>

             @error('description')
            <span class="text-danger" role="alert">
                  {{ $message }}
            </span>
             @enderror

            <label for="description">Description</label>
            {{-- <textarea name="description" id="" cols="30" rows="10"></textarea> --}}
            <input type="text" name="description" >

            <input type="submit" value="submit">


        </form>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
