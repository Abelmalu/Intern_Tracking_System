@extends('adminlte::page')

@section('title', 'Internship|Apply')

@section('content_header')
    <div class="container-fluid ">
        <div class="row justify-content-between">
            <div class="col-2">
                <h1>Apply</h1>
            </div>
            <div class="col-1">
                <h5>Home</h5>
            </div>
        </div>
    </div>
@stop


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                @if (session('error'))
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fas fa-ban"></i>
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                @if (session('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fas fa-check"></i>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if (auth()->user()->hasInternship())
                    <div class="col-md-12">
                        <div class="callout callout-danger">
                            <p>You have Internship in progress, you cannot apply for another internship.</p>
                        </div>
                    </div>
                @endif



            @stop
