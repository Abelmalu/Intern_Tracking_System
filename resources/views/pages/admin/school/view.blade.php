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
                <div class="card-title">School Detail</div>
            </div>
            <div class="card-body">

                <div class="row justify-content-center">
                    <dt class="col-sm-2">School Id: </dt>
                    <dd class="col-sm-10">{{$school->id}}</dd>



                    <dt class="col-sm-2">School Name: </dt>
                    <dd class="col-sm-10">{{$school->name}}</dd>

                    <dt class="col-sm-2"> Description: </dt>
                    <dd class="col-sm-10">{{$school->description}}</dd>

                    <dt class="col-sm-2">School head: </dt>

                     @if (!empty($school->head))
                    <dd class="col-sm-10">{{$school->head->name}}</dd>
                @else
                    <dd class="col-sm-10">Not assigned</dd>
                @endif

                <dt class="col-sm-2">Registered: </dt>
                 <dd class="col-sm-10"> {{ \Carbon\Carbon::parse($school->created_at)->setTimezone('Africa/Addis_Ababa')->format('d/m/Y \a\t H:i a') }}</dd>

                <dt class="col-sm-2">Last Update: </dt>
                 <dd class="col-sm-10"> {{ \Carbon\Carbon::parse($school->updated_at)->setTimezone('Africa/Addis_Ababa')->format('d/m/Y \a\t H:i a') }}</dd>



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
