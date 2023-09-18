@extends('layouts.owner')


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
                {{ $shops->withQueryString()->links() }}
                <table class="table table-bordered mt-5">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th width="100px">Action</th>
                    </tr>
                    @foreach ($shops as $shop)
                        <tr>
                            <td>{{ $shop->name }}</td>
                            <td>{{ $shop->description }}</td>
                            <td>
                                <a href="{{ route('editshop', [
                                        'shop' => $shop->getKey(),
                                    ]) }}"
                                        class="btn btn-success">Setting</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
