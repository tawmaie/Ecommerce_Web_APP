@extends('layouts.main')

@section('content')
    <?php $total = 0; ?>
    <h1 class="text-center">Shopping Cart</h1>
    <table class="table table-bordered mt-5">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description
            <th width='120'>Quantity</th>
            <th>Price</th>
            <th width="100">Action</th>
        </tr>
        @if (session('cart') != null)
            @foreach (session('cart') as $id => $product)
                <tr>
                    <td><img src="{{ asset($product['img']) }}" style="width: 100px" alt=""></td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['description'] }}</td>
                    <td>
                        <form action=" {{ route('updatecart') }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}" />
                            <input type="number" id="quantity" name="quantity" min="1"
                                max="{{ $product['stock'] }}" value="{{ $product['quantity'] }}">
                            <button type="submit" class="btn btn-info"><i class="bi bi-arrow-clockwise"></i></button>
                        </form>
                    </td>

                    <td>{{ $product['price'] }}</td>
                    <td>
                        <a href="{{ route('removefromcart', $id) }}"><button type="button" class="btn btn-danger"><i
                                    class="bi bi-trash"></i></button></a>
                    </td>
                </tr>
                <?php
                $total += $product['price'] * $product['quantity'];
                ?>
            @endforeach
        @endif
    </table>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
            </div>
            <div class="col text-end">
                <p class="h3"><strong>Total {{ $total }} baht</strong></p>
                @if (Auth::user())
                    <div class="d-flex flex-row-reverse"><a href="{{ route('checkout') }}"><button type="button"
                                class="btn btn-success">Checkout</button></a></a></div>
                @else
                    <div class="d-flex flex-row-reverse"><a href="{{ route('login') }}"><button type="button"
                                class="btn btn-success">To checkout please login</button></a></a></div>
                @endif
            </div>

        </div>
    </div>

@endsection
