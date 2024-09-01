@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    <h1>{{ __('Post List') }}</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    @livewire('admin.allposts-index')
@stop
