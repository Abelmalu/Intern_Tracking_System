@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Application information</h3>
                    </div>
                </div>
                <div class="card-body">
                    <x-adminlte-datatable id="table2" :heads="$heads">


                        @foreach ($applications as $application)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $application->user->name}}</td>
                                <td>{{ $application->internship->title }}</td>
                                @if ($application->status == 0)
                                    <td>pending</td>
                                @elseif ($application->status == 1)
                                    <td>accepted</td>
                                @else
                                    <td>Rejected</td>
                                @endif
                                <td>{{ $application->created_at }}</td>

                                <td><a href="{{ route('department.application.view', $application) }}">
                                                    <button class="btn btn-info btn-xs btn-flat">
                                                        <i class="fas fa-eye"></i>
                                                        View
                                                    </button>
                                                </a></td>
                                <td><a href="{{ route('department.application.delete', $application) }}">
                                                    <button class="btn btn-danger btn-xs btn-flat">
                                                        <i class="fas fa-eye"></i>
                                                        delete
                                                    </button>
                                                </a></td>
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
