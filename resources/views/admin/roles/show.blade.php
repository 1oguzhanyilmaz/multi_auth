@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Show Role Details</span>
                        <a class="btn btn-sm btn-dark" href="{{ route('admin.roles.index') }}">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>ID : </td>
                                <td>{{ $role->id }}</td>
                            </tr>
                            <tr>
                                <td>Name : </td>
                                <td>{{ $role->name }}</td>
                            </tr>
                            <tr>
                                <td>Permissions : </td>
                                <td>
                                    <?php $tut = ''; ?>
                                    @foreach($role->permissions as $permission)
                                        <?php $tut .= $permission->name . ','; ?>
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
