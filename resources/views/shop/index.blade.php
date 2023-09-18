@extends('layouts.admin')


@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Shop List</h1>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="container-md">
                <a href="  {{ route('shops.create')}} " class="btn btn-success">Add Shop</a>
                {{ $shops->withQueryString()->links() }}
                <table class="table table-bordered mt-5">
                    <tr>
                        <th>Name</th>
                        <th>Owner</th>
                        <th>Description</th>
                        <th width="170">Action</th>
                    </tr>
                    @foreach ($shops as $shop) 
                        <tr>
                            <td>{{ $shop->name }}</td>
                            <td>{{ $shop->user?->name }}</td>
                            <td>{{ $shop->description }}</td>
                            <td>
                                <form action="{{ route('shops.destroy', $shop->id) }}" method="POST">
                                    <a href="{{ route('shops.edit', $shop->id) }}" class="btn btn-warning">EDIT</a>
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


