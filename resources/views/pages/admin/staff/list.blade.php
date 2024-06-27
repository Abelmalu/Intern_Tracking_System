@extends('adminlte::page')

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
    <table id="dataTable" class="table table-bordered table-striped">
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Actions</th>

        </tr>

        @foreach ($staffs as $staff)
            <tr>
                <td>{{ $staff->name }}</td>
                {{-- {{ route('admin.staff.view', $staff->id) }} --}}
{{--
                <td>{{head of }}</td> --}}
                <td>
                    <a href="{{ route('staff.show', $staff)}}">
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
                    <a href="{{ route('staff.delete',$staff)}}" onclick="if(confirm('Are you sure, you want to delete this user ? ') == false){event.preventDefault()}">

                        <button class="btn btn-danger btn-xs btn-flat">
                            <i class="fas fa-trash"></i>
                            Delete
                        </button>
                    </a>
                </td>

            </tr>
        @endforeach
    </table>
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
