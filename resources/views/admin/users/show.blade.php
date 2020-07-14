@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <span>Show User Details</span>
                        <a class="btn btn-sm btn-dark" href="{{ route('admin.users.index') }}">Back</a>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <tr>
                                <td>ID : </td>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <td>Email : </td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Roles : </td>
                                <td>
                                    <?php $tut = ''; ?>
                                    @foreach($user->roles as $role)
                                        <?php $tut .= $role->name . ','; ?>
                                    @endforeach
                                    <?= rtrim($tut, ',') ?>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
