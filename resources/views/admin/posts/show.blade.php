@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Show Post Details</span>
                        <a class="btn btn-sm btn-dark" href="{{ route('admin.posts.index') }}">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>ID : </td>
                                <td>{{ $post['id'] }}</td>
                            </tr>
                            <tr>
                                <td>Title : </td>
                                <td>{{ $post['title'] }}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
