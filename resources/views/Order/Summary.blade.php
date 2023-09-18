@extends('layouts.main')

@section('content')
<div class="container">
  <?php
    $total = 0
  ?>
    <div class="py-5 text-center">
      <h2>Checkout form</h2>
    </div>

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
            @foreach (session('cart') as $id => $cart)
            <?php
                $total += $cart['price'] * $cart['quantity'];
            ?>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">{{$cart['name']}}</h6>
                  <small class="text-muted">{{$cart['quantity']}}</small>
                </div>
                <span class="text-muted">{{$cart['price']}}</span>
              </li>
            @endforeach
        </ul>

        <div class="card p-2">
          <strong>Total {{ $total }} baht</strong>
        </div>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        <form action=" {{ route('OrderPlacement') }} " method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="total" value="{{$total}}">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" name="fname" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" name="lname" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email </label>
            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="mb-3">
            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
          </div>

          <div class="row">
            
            <div class="col-md-4 mb-3">
              <label for="state">State/Province</label>
              <select class="custom-select d-block w-100" id="state" name="state" required>
                <option value="">Choose...</option>
                <option>ChiangMai</option>
                <option>Bangkok</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-5 mb-3">
              <label for="country">City</label>
              <select class="custom-select d-block w-100" id="country" name="city" required>
                <option value="">Choose...</option>
                <option>Suthep</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">Zip</label>
              <input type="text" class="form-control" id="zip" placeholder="" name="zip" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
@endsection