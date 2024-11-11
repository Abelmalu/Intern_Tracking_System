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
                                <td>{{ $application->internship->title }}</td>
                                @if ($application->status == 0)
                                    <td>pending</td>
                                @elseif ($application->status == 1)
                                    <td>accepted</td>
                                @else
                                    <td>Rejected</td>
                                @endif
                                <td>{{ $application->created_at }}</td>
                                <td>{{ $application->internship->start_date }}</td>
                                <td>No action required</td>
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
