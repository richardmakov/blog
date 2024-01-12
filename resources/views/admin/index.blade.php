@extends('adminlte::page')
@section('title', 'Admin Panel')

@section('content_header')

@stop

@section('content')
    
    @include('profile.show')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop