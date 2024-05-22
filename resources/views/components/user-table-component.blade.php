<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('model.user.id') }}</th>
            <th scope="col">{{ __('model.user.name') }}</th>
            <th scope="col">{{ __('model.user.email') }}</th>
            <th scope="col">{{ __('model.created_at') }}</th>
            <th scope="col">{{ __('table.action')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <a href="{{ route($prefixRoute.'.show', $user->id) }}" class="btn btn-icon btn-sm btn-primary">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route($prefixRoute.'.edit', $user->id) }}" class="btn btn-icon btn-sm btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route($prefixRoute.'.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-icon btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
