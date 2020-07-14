@extends('admin.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Posts</div>
                <div class="card-body">
                    <h3>Posts</h3>
                    @foreach($posts as $post)
                        <div class="bg-light p-4 my-2 rounded-lg border">
                            <h3>{{ $post['title'] }}</h3>
                            <p>{{ $post['body'] }}</p>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.posts.show', $post['id']) }}" class="btn btn-sm btn-info px-2 mx-1">Show</a>
                                <a href="{{ route('admin.posts.edit', $post['id']) }}" class="btn btn-sm btn-info px-2 mx-1">Edit</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
