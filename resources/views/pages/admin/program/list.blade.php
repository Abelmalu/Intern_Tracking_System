@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('title', 'Dashboard')

@section('content_header')
    <h1>List page</h1>
@stop

@section('content')


    {{-- Setup data for datatables --}}
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Program Information</div>
                </div>
                <div class="card-body">

                    <x-adminlte-datatable id="table1" :heads="$heads">


                        @foreach ($programs as $program)
                            <tr>

                                <td>{!! $loop->iteration !!}</td>
                                <td>{!! $program->name !!}</td>





                                <td>
                                    <a href="{{ route('program.show', $program) }}">
                                        <button class="btn btn-info btn-xs btn-flat">
                                            <i class="fas fa-eye"></i>
                                            View
                                        </button>
                                    </a>
                                    <a href="{{ route('program.edit', $program) }}">
                                        <button class="btn btn-primary btn-xs btn-flat">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </button>
                                    </a>
                                    <a href="{{ route('program.delete', $program) }}"
                                        onclick="if(confirm('Are you sure, you want to delete {{ $program->name }}?') == false){event.preventDefault()}">
                                        <button class="btn btn-danger btn-xs btn-flat">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </a>
                                </td>


                            </tr>
                        @endforeach


                    </x-adminlte-datatable>

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
