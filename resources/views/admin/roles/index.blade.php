@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span>Roles Management</span>
                        @can('create-roles')
                            <a class="btn btn-success" href="{{ route('admin.roles.create') }}"> Create New Role</a>
                        @endcan
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>
                                        {{ $role->name }}
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            @can('show-roles')
                                                <a class="btn btn-info btn-sm" href="{{ route('admin.roles.show',$role->id) }}">Show</a>
                                            @endcan

                                            @can('edit-roles')
                                                <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit',$role->id) }}">Edit</a>
                                            @endcan

                                            @can('delete-roles')
                                                <button type="submit" onclick="return confirm('Sure this delete ?');" class="delete btn btn-danger btn-sm">Delete</button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
