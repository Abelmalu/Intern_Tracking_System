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
                        <li class="breadcrumb-item">School</li>
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
                    <div class="card-title">School information</div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="{{ route('school.update', $school) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <label for="head" class="form-label">School Head</label>
                                <select id="head" class="form-control form-select mb-3" name="head_id">

                                    @if (!empty($school->head->name))
                                        <option value="{{ $school->head->id }}" selected>{{ $school->head->name }}</option>
                                    {{-- @else
                                        <option value="">None for now</option> --}}
                                    @endif


                                    <option value="">None for now</option>
                                    @foreach ($staffs as $staff)
                                        @if (!empty($school->head->id))
                                            @continue($school->head->id == $staff->id)
                                        @endif
                                        @if (empty($staff->hasAnyrole(['admin','school','department'])))
                                        <option value="{{ $staff->id }} ">{{ $staff->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                <label for="name" class="form-label">School Name</label>
                                <input type="text" class="form-control mb-3" placeholder="School Name" name="name"
                                    value="{{ $school->name }}">


                                <label for="description" class="form-label"> Description</label>
                                <input type="text" class="form-control mb-3" placeholder="Description" name="description"
                                    value="{{ $school->description }}">

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
