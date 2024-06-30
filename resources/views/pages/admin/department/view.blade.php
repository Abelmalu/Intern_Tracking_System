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
                        <li class="breadcrumb-item">Department</li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')
    <div class="container-fluid ">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Department Detail</div>
            </div>
            <div class="card-body">

                <div class="row justify-content-center">
                    <dt class="col-sm-2">department Id: </dt>
                    <dd class="col-sm-10">{{$department->id}}</dd>



                    <dt class="col-sm-2">department Name: </dt>
                    <dd class="col-sm-10">{{$department->name}}</dd>

                    <dt class="col-sm-2"> Description: </dt>
                    <dd class="col-sm-10">{{$department->description}}</dd>

                    <dt class="col-sm-2">department head: </dt>

                     @if (!empty($department->head))
                    <dd class="col-sm-10">{{$department->head->name}}</dd>
                @else
                    <dd class="col-sm-10">Not assigned</dd>
                @endif

                <dt class="col-sm-2">Registered: </dt>
                 <dd class="col-sm-10"> {{ \Carbon\Carbon::parse($department->created_at)->setTimezone('Africa/Addis_Ababa')->format('d/m/Y \a\t H:i a') }}</dd>

                <dt class="col-sm-2">Last Update: </dt>
                 <dd class="col-sm-10"> {{ \Carbon\Carbon::parse($department->updated_at)->setTimezone('Africa/Addis_Ababa')->format('d/m/Y \a\t H:i a') }}</dd>



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
