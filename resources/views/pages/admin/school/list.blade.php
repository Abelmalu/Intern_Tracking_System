@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>List page</h1>
@stop

@section('content')

    <table id="dataTable" class="table table-bordered table-striped">
        <tr>
            <th>School name</th>
            <th>School head</th>
            <th>Department count</th>
            <th>Action</th>
        </tr>
        @foreach ($schools as $school)
            <tr>
                <td>{{ $school->name }}</td>
                @if (!empty($school->head))
                    <td>{{ $school->head->name }}</td>
                @else
                    <td>Not assigned</td>
                @endif


                <td>{{ $school->departments->count() }}</td>
                <td>
                    <a href="{{ route('school.show', $school) }}">
                        <button class="btn btn-info btn-xs btn-flat">
                            <i class="fas fa-eye"></i>
                            View
                        </button>
                    </a>
                    <a href="{{ route('school.edit', $school) }}">
                        <button class="btn btn-primary btn-xs btn-flat">
                            <i class="fas fa-edit"></i>
                            Edit
                        </button>
                    </a>
                    <a href="{{ route('school.delete', $school) }}"
                        onclick="if(confirm('Are you sure, you want to delete {{ $school->name }}?') == false){event.preventDefault()}">
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
