@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="color: #4B0D74;">User List</h1>
    @can('create-user')
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3" style="background-color: #4B0D74; border-color: #4B0D74;">Add Users</a>
    @endcan
    <table class="table table-striped" style="background-color: #D529B4; color: #FFFFFF;">
        <thead>
            <tr style="text-align: center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Roles</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                <style>
                    td, th {
                        border-right: 1px solid rgb(222, 201, 237); /* Garis antar kolom */
                        padding: 10px;
                    }

                    /* Hapus garis kanan untuk kolom terakhir */
                    td:last-child, th:last-child {
                        border-right: none;
                    }
                </style>
                    <th scope="row" style="text-align: center">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach ($user->getRoleNames() as $role)
                            <span>{{$role}}</span>
                        @endforeach 
                    </td>
                    <td>
                        @can('edit-user')
                            @if (auth()->user()->id == $user->id || !$user->hasRole('Admin'))
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary" style="background-color: #4B0D74; border-color: #4B0D74; margin-right: 5px;">Edit</a>
                            @endif
                        @endcan
                        @can('delete-user')
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="background-color: #8813A8; border-color: #8813A8;"
                                    onclick="return confirm('Do you want to delete this user?');"><i class="bi bi-trash"></i>Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection