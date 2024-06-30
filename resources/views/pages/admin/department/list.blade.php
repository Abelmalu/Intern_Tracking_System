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
                    <div class="card-title">School Information</div>
                </div>
                <div class="card-body">

                    <x-adminlte-datatable id="table1" :heads="$heads">


                        @foreach ($departments as $department)
                            <tr>

                                <td>{!! $loop->iteration !!}</td>
                                <td>{!! $department->name !!}</td>
                                <td>{{$department->school->name}}</td>
                                @if (!empty($department->head))
                                    <td>{{ $department->head->name }}</td>
                                @else
                                    <td>Not assigned</td>
                                @endif




                                <td>
                                    <a href="{{ route('department.show', $department) }}">
                                        <button class="btn btn-info btn-xs btn-flat">
                                            <i class="fas fa-eye"></i>
                                            View
                                        </button>
                                    </a>
                                    <a href="{{ route('department.edit', $department) }}">
                                        <button class="btn btn-primary btn-xs btn-flat">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </button>
                                    </a>
                                    <a href="{{ route('department.delete', $department) }}"
                                        onclick="if(confirm('Are you sure, you want to delete {{ $department->name }}?') == false){event.preventDefault()}">
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
