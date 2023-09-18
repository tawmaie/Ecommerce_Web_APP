@extends('layouts.owner')

@section('content')
    <div class="col-md-12 text-center">
        <h1>Product List</h1>
    </div>
    @if ($message = Session::get('error'))
        <div class="alert alert-warning">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card my-4">
        <div class="card-header">
            Create Product
        </div>
        <div class="card-body">
            <form action=" {{ route('shops.product.store', (array) Route::current()->parameters()) }} " method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" aria-label="Default select example" id="type_id" name="type_id">
                        @foreach ($types as $type)
                            <option value="{{ $type->getKey() }}" @selected(old('type_id') == $type->getKey())>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Your product picture</label>
                    <input class="form-control" type="file" id="img" name="img">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('shops.product.index', [...((array) Route::current()->parameters())]) }}"
                    class="btn btn-danger">Cancle</a>
            </form>
        </div>
    </div>
@endsection
