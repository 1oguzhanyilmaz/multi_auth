@extends('front.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Anasayfa</div>

                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="user_id" value="{{ $user->id }}">

                            <div class="form-group">
                                <label for="name">Name :</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" id="name" name="name">
                            </div>

                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input type="email" class="form-control" value="{{ $user->email }}" id="email" name="email">
                            </div>

                            <div class="form-group">
                                <label for="address">Address :</label>
                                <input type="text" class="form-control" value="{{ $user->userDetail->address }}" id="address" name="address">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone :</label>
                                <input type="text" class="form-control" value="{{ $user->userDetail->phone }}" id="phone" name="phone">
                            </div>

                            <div class="form-group">
                                <label for="city">City :</label>
                                <input type="text" class="form-control" value="{{ $user->userDetail->city }}" id="city" name="city">
                            </div>


                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
