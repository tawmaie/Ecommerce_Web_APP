@extends('layouts.main')

@section('content')
{{-- <link rel="stylesheet" href="{{ asset('css/product.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('css/product2.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('css/product1.css') }}">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md">
                    <div class="preview-pic">
                        <div class="tab-pane" id="pic-1"><img src="{{asset($product->img)}}" width="500" height="500"/></div>
                    </div>
                </div>
                <div class="details col-md">
                    <h3 class="product-title">{{$product->name}}</h3>
                    <p class="product-description">{{$product->description}}</p>
                    <h4 class="price">price: <span>{{$product->price}}</span></h4>
                    <h4 class="stock">stock: <span>{{$product->stock}}</span></h4>
                    <div class="action">
                        <button class="add-to-cart btn btn-success" type="button">Add to cart</button>
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
