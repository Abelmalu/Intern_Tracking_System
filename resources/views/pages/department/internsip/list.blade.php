@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-lg-2">
                <h1> Internship List</h1>
            </div>
            <div class="col-lg-2">
                <p>Home / Intersnhip / List </p>
            </div>
        </div>
    </div>

@stop

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>internship information</h3>
                    </div>
                </div>
                <div class="card-body">
                    <x-adminlte-datatable id="table2" :heads="$heads">


                        @foreach ($internships as $internship)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $internship->title }}</td>
                                <td>{{ $internship->quota }}</td>
                                <td>{{ $internship->deadline }}</td>
                                <td>
                                    @if ($internship->status == 0)
                                        <span class="badge badge-danger">Ended</span>
                                    @elseif ($internship->status == 1 && !$internship->isDeadlinePassed())
                                        <span class="badge badge-success">Accepting Applicants</span>
                                    @elseif ($internship->status == 2)
                                        <span class="badge badge-warning">Ongoing</span>
                                    @elseif ($internship->status == 3)
                                        <span class="badge badge-info">Waiting</span>
                                    @elseif ($internship->status == 4)
                                        <span class="badge badge-danger">Aborted</span>
                                    @endif
                                </td>



                                <td>
                                    @if (!$internship->isEnded() && $internship->isStarted() && $internship->status != '2')
                                        <a href="{{ route('department.internship.start', $internship->id) }}">
                                            <button class="btn btn-success btn-xs btn-flat">
                                                <i class="fas fa-check"></i>
                                                Start
                                            </button>
                                        </a>
                                    @endif
                                    <a href="{{ route('internship.show', $internship) }}">
                                        <button class="btn btn-info btn-xs btn-flat">
                                            <i class="fas fa-eye"></i>
                                            View
                                        </button>
                                    </a>

                                    <a href="{{ route('internship.edit', $internship) }}">
                                        <button class="btn btn-primary btn-xs btn-flat">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </button>
                                    </a>
                                    <a href="{{ route('internship.delete', $internship) }}"
                                        onclick="if(confirm('Are you sure, you want to delete this internship ? ') == false){event.preventDefault()}">

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
