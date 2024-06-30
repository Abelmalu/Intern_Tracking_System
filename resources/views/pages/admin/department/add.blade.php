@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add School</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">School</li>
                        <li class="breadcrumb-item active">Add</li>
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
                    <div class="card-title">Department information</div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="{{ route('department.store') }}" method="POST">
                                @csrf
                                <label for="school" class="form-label">Select School</label>
                                <select name="school_id" id="school" class="form-control mb-4">
                                    <option value="" disabled selected>Select School </option>
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                    @endforeach

                                </select>

                                <label for="head" class="form-label">Department Head</label>
                                <select id="head" class="form-control form-select mb-4" name="head_id">

                                    <option value="" disabled selected>Select department head</option>

                                    @foreach ($staffs as $staff)
                                        @if (empty($staff->hasAnyrole(['admin','school','department'])))
                                            <option value="{{ $staff->id }} ">{{ $staff->name }}</option>


                                        @endif
                                    @endforeach
                                </select>

                                <label for="name" class="form-label">Deparment Name</label>
                                <input type="text" class="form-control mb-4" placeholder="Department Name"
                                    name="name">


                                <label for="description" class="form-label"> Description</label>
                                <textarea name="description" id="description" class="form-control mb-3"></textarea>


                                <input type="submit" value="Register" class="float-right btn btn-primary">


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
