@extends('layouts.main')

@section('content')
    <h1 class="text-center">Register</h1>
    <div class="container-lg  align-middle">
        <div class="card mx-auto" style="width: 350px;">
            <div class="card-body">
                <form action="{{route('usercreateshop')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Shop Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Your Shop Logo</label>
                        <input class="form-control" type="file" id="logo" name="logo">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
