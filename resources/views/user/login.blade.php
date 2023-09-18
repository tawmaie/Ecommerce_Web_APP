@extends('layouts.main')
@section('content')
    @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
    @endif
    <h1 class="text-center">Login</h1>
    <div class="container-lg  align-middle">
        <div class="card mx-auto" style="width: 350px;">
            <div class="card-body">
                <form action="{{ route('authenticate') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email-Address</label>
                        <input type="text" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">LOGIN</button>
                </form>
            </div>
        </div>
        <p class="text-center"><a href="{{ route('register') }}">Need an account? SIGN UP</a></p>
        <p class="text-center">
            @error('credentials')
            <div class="warn">{{ $message }}</div>
        @enderror
    </div>
@endsection
