@extends('admin.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex d-flex justify-content-between">
                        <span>Edit Role</span>
                        <a class="btn btn-sm btn-dark" href="{{ route('admin.roles.index') }}">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                            <!-- Name Form Input -->
                            <div class="form-group">
                                <label for="name">Name :</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $role->name }}" placeholder="Email">
                                @if ($errors->has('name'))
                                    <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>

                            @foreach($permissions as $permission)
                                <div class="col-md-3">
                                    <div class="form-check checkbox">
                                        <label class="form-check-label">
                                            <input type="checkbox" {{ (in_array($permission->id, $permission_ids)) ? 'checked' : '' }} class="form-check-input" name="permissions[]" value="{{ $permission->id }}">{{ $permission->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-footer pt-5 border-top">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
