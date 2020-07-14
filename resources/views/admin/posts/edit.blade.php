@extends('admin.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex d-flex justify-content-between">
                        <span>Edit Post</span>
                        <a class="btn btn-sm btn-dark" href="{{ route('admin.posts.index') }}">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST">
                        @csrf
                        @method('PUT')

                            <!-- Name Form Input -->
                            <div class="form-group">
                                <label for="title">Title :</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $post['title'] }}">
                            </div>


                            @can('edit-posts')
                                <div class="form-footer pt-5 border-top">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
