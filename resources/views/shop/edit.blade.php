@extends('layouts.admin')

@section('content')
    <div class="col-md-12 text-center">
        <h1>Shop List</h1>
    </div>
    @if ($message = Session::get('error'))
        <div class="alert alert-warning">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card my-4">
        <div class="card-header">
            Edit Shop
        </div>
        <div class="card-body">
            <form action=" {{ route('shops.update', $shop->id) }} " method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Shop Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $shop['name']) }}">
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="type" class="form-label">Shop Owner</label>
                        <select class="form-select" aria-label="Default select example" id="user_id" name="user_id">
                            @foreach ($users as $user)
                                <option value="{{ $user->getKey() }}" @selected(old('user_id', $shop->user?->getKey()) == $user->getKey())>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('shops.index') }}" class="btn btn-danger">Cancle</a>
            </form>
        </div>
    </div>
@endsection
