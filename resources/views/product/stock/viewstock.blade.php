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
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td><img src="{{ asset($product->img) }}" style="width: 100px" alt=""></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->type->name }}</td>                        
                        <td>{{ $product->price }}</td>
                        <td>
                            <form action=" {{ route('updatestock') }} " method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}"/>
                                <input type="number" id="stock" name="stock" min="1" max="1000" value="{{$product->stock}}">
                                <button type="submit" class="btn btn-info"><i class="bi bi-arrow-clockwise"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection