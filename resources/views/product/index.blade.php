@extends('layouts.owner')

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
                        <a href=" {{ route('shops.product.create', (array) Route::current()->parameters()) }} "
                        class="btn btn-success">Add Product</a>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <input type="text" placeholder="Search.." style="border-radius: 2px">
                        <button type="button" class="btn btn-outline-primary">
                            Search
                        </button>
                    </div>
                </div>
                {{ $products->withQueryString()->links() }}
                <table class="table table-bordered mt-5">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th width="170">Action</th>
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <td><img src="{{ asset($product->img) }}" style="width: 100px" alt=""></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->type->name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <form
                                    action=" {{ route('shops.product.destroy', [...((array) Route::current()->parameters()), 'product' => $product->id]) }} "
                                    method="POST">
                                    <a href=" {{ route('shops.product.edit', [...((array) Route::current()->parameters()), 'product' => $product->id]) }} "
                                        class="btn btn-warning">EDIT</a>
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
