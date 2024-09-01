<div>

    <div class="card">

        <div class="card-header">
            <input wire:model ="search" class="form-control" placeholder="Enter name or mail of the user">
        </div>

        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td width= "10px">
                                    <a class="btn btn-primary" href="{{ route('admin.users.edit', $user) }}">{{ __('Edit') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            
            <div class="card-body">
                <strong>{{ __('User no exist') }}</strong>
            </div>
            
        @endif
    </div>

</div>
