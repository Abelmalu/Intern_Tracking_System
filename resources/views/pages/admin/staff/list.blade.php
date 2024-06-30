@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-lg-2">
                <h1> Staff List</h1>
            </div>
            <div class="col-lg-2">
                <p>Home / Staff / List </p>
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
                        <h3>Staff information</h3>
                    </div>
                </div>
                    <div class="card-body">
                        <x-adminlte-datatable id="table2" :heads="$heads">


                            @foreach ($staffs as $staff)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $staff->name }}</td>
                                    {{-- {{ route('admin.staff.view', $staff->id) }} --}}
                                    @if(!empty($staff->role )&& $staff->role->name == 'school' || 'department' )
                                    <td>head of {{ $staff->role }} </td>

                                    @else
                                        <td>Role not given</td>

                                    @endif


                                    <td>
                                        <a href="{{ route('staff.show', $staff) }}">
                                            <button class="btn btn-info btn-xs btn-flat">
                                                <i class="fas fa-eye"></i>
                                                View
                                            </button>
                                        </a>

                                        {{-- <a href="{{ route('staff.edit',$staff )}}">
                        <button class="btn btn-primary btn-xs btn-flat">
                            <i class="fas fa-edit"></i>
                            Edit
                        </button> --}}
                                        </a>
                                        <a href="{{ route('staff.delete', $staff) }}"
                                            onclick="if(confirm('Are you sure, you want to delete this user ? ') == false){event.preventDefault()}">

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
