@extends('adminlte::page')
@section('title', 'Admin Panel')

@section('content_header')
@can('admin.categories.create')
    <a href="{{ route('admin.categories.create') }}" class="btn btn-secondary btn-sm float-right">Add category</a>
@endcan
    <h1>Categories list</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="10px">
                                @can('admin.categories.edit')
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                @endcan
                        </td>
                        <td width="10px">
                            @can('admin.categories.destroy')
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
