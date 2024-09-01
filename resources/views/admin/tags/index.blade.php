@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    @can('admin.tags.create')
        <a class="btn btn-secondary float-right" href="{{ route('admin.tags.create') }}">{{ __('New Tag') }}</a>
    @endcan

    <h1>{{ __('Show Tags') }}</h1>
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
                        <th>{{ __('Name') }}</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag['id'] }}</td>
                            <td>{{ $tag['name'] }}</td>
                            <td width= "10px">
                                @can('admin.tags.edit')
                                    <a href="{{ route('admin.tags.edit', $tag['id']) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                                @endcan
                            </td>
                            <td width= "10px">
                                @can('admin.tags.destroy')
                                    <form action="{{ route('admin.tags.destroy', $tag['id']) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
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
