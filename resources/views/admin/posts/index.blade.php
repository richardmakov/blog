@extends('adminlte::page')
@section('title', 'Admin Panel')

@section('content_header')

    <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary float-right">Create new post</a>

    <h1>Post List</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    @livewire('admin.posts-index')
@stop

