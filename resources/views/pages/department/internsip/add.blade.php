@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="container-fluid">
        <div class="row justify-content-between my-3">
            <div class="col-4">
                <h4 class="display-5">Add Internship</h4>

            </div>
            <div class="col-2">
                <p>Internship / home / add</p>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <p>Internship Information</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <form action="">
                                    @csrf
                                    <label for="program" class="label-form">Select Program</label>
                                    <select name="program" id="program" class="form-control mb-3">
                                        <option value="">let's go </option>
                                    </select>




                                    <label for="title" class="label-form">Title</label>
                                    <input type="text" class="form-control mb-3" name="title" id="title"
                                        placeholder="Enter title">

                                    <label for="CGPA" class="label-form">Minimum CGPA</label>
                                    <input type="text" name="cgpa" id="cgpa" id="CGPA"
                                        placeholder="Enter CGPA" class="form-control mb-3">

                                    <label for="description" class="label-form">Description</label>
                                    <textarea name="description" id="description" class="form-control mb-3" id="title" placeholder="Type description"></textarea>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="" class="label-form">Application Deadline</label>
                                            <input type="date" class="form-control mb-3">
                                            <label for="" class="label-form">Start Date</label>
                                            <input type="date" class="form-control mb-3">


                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="" class="label-form">End Date</label>
                                            <div class="input-group date" id="reservationdatetime3"
                                                data-target-input="nearest">
                                                <input type="text" name="deadline"
                                                    class="form-control datetimepicker-input"
                                                    data-target="#reservationdatetime3" placeholder="DeadLine" required />
                                                <div class="input-group-append" data-target="#reservationdatetime3"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="" class="label-form">Quota</label>
                                            <input type="number" class="form-control mb-3">


                                        </div>

                                    </div>
                                    <input type="submit" value="Register" class="float-right btn btn-primary mb-3">
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
    {{-- Add here extra stylesheets     --}}
   
    {{-- @vite(['resources/js/app.js']) --}}

    <link rel="stylesheet" href="{{ asset('tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }} ">

@stop

@section('js')







    <script src="{{ asset('moment/moment.min.js') }}"></script>
    <script src="{{ asset('tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script type="">
        $('#reservationdatetime3').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            icons: {
                time: 'far fa-clock'
            }
        });
        // ajax
    </script>
    </body>
@stop
