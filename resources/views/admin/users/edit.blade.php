@extends('admin.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span>New User</span>
                        <a class="btn btn-sm btn-dark" href="{{ route('admin.users.index') }}">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- email Form Input -->
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" placeholder="Email">
                                @if ($errors->has('email'))
                                    <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <!-- password Form Input -->
                            <div class="form-group">
                                <label for="password">Password :</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                @if ($errors->has('password'))
                                    <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>

                            <!-- Roles Form Input -->
                            <div class="form-group">
                                <label for="roles[]">Roles :</label>
                                <select class="form-control" name="roles[]" multiple>
                                    @foreach($roles as $role)
                                        <option {{ (in_array($role->id, $role_ids)) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('roles')) <p class="help-block text-danger">{{ $errors->first('roles') }}</p> @endif
                            </div>

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
