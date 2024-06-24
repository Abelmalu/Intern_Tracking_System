

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>List page</h1>
@stop

@section('content')

<table>
    <tr>
        <th >School name</th>
        <th>School head</th>
        <th>Department count</th>
        <th>Action</th>
    </tr>
 @foreach ( $schools as $school )
 <tr>
    <td>{{ $school->name }}</td>
    <td>{{ $school->head }}</td>
    <td>{{ $school->departments->count() }}</td>
    <td>action</td>
 </tr>

 @endforeach
    <tr>
        <td>hellow</td>
        <td>welcome</td>
        <td>to</td>
        <td>the world</td>
    </tr>
</table>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
