@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span>Users Management</span>
                        @if(auth()->user()->hasRole('Admin'))
                            <a class="btn btn-success" href="{{ route('admin.users.create') }}"> Create New User</a>
                        @endif
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if (auth()->user()->hasRole('Admin'))
{{--                                            @if(!$user->hasRole('Admin'))--}}
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <a class="btn btn-info btn-sm" href="{{ route('admin.users.show',$user->id) }}">Show</a>
                                                <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit',$user->id) }}">Edit</a>
                                                <button type="submit" onclick="return confirm('Sure this delete ?');" class="delete btn btn-danger btn-sm">Delete</button>
                                            </form>
{{--                                            @endif--}}
                                        @endif
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
