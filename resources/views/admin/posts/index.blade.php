@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary float-right">{{ __('Create new post') }}</a>

    <h1>{{ __('Post List') }}</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    @livewire('admin.posts-index')
@stop