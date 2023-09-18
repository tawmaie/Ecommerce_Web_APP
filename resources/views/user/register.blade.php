@extends('layouts.main')
@section('content')
<h1 class="text-center">Register</h1>
    <div class="container-lg  align-middle">
        <div class="card mx-auto" style="width: 350px;">
            <div class="card-body">
                <form action=" {{ route('regis') }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="Email" name="email" placeholder="email@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="inputPassword">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
        <p class="text-center"><a href="{{ route('login') }}">Have an account? LOG IN</a></p>
    </div>

@endsection