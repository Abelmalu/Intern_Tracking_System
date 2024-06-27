
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-lg-2">
                <h1>Edit Staff</h1>
            </div>
            <div class="col-lg-2">
                <p>Home / Staff / Edit </p>
            </div>
        </div>
    </div>
@stop

@section('content')
    
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
