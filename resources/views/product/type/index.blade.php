@extends('layouts.owner')

@section('content')
    <div class="container">
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
                <a href="{{ route('shops.type.create' , (array) Route::current()->parameters()) }}" class="btn btn-success">Add Type</a>
                {{ $types->withQueryString()->links() }}
                <table class="table table-bordered mt-5">
                    <tr>
                        <th width='200'>Type Name</th>
                        <th>Description</th>
                        <th width='170'>Action</th>
                    </tr>
                    @foreach ($types as $type)
                        <tr>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->description }}</td>
                            <td>
                                <form
                                    action=" {{ route('shops.type.destroy', [...((array) Route::current()->parameters()), 'type' => $type->id]) }} "
                                    method="POST">
                                    <a href=" {{ route('shops.type.edit', [...((array) Route::current()->parameters()), 'type' => $type->id]) }} " class="btn btn-warning">EDIT</a>
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
