@extends('layouts.main')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Product List</h1>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="container-md">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col d-flex justify-content-end">
                        <input type="text" placeholder="Search.." style="border-radius: 2px">
                        <button type="button" class="btn btn-outline-primary">
                            Search
                        </button>
                    </div>
                </div>
                {{-- {{ $users->withQueryString()->links() }} --}}
                <table class="table table-bordered mt-5">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="170">Action</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
