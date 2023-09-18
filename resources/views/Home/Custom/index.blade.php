@extends('layouts.owner')

@section('content')
<div class="container mt-3">
    <div class="mt-4 p-5 bg-primary text-white rounded">
      <h1>Customize Your Own Shop</h1> 
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p> 
    </div>
    @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
    @endif
  </div>
    <div class="container">
        <div class="row">
            @foreach ($shops as $shop)
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card mt-5" style="border-radius: 10px; ">
                        <img class="card-img-top" src="{{asset($shop->logo)}}" alt="Card image cap"
                            style="border-radius: 50%">
                        <div class="card-body text-center">
                            <h4 class="card-body"><a href="{{route('showHome',$shop->getKey())}}" title="View Product">{{ $shop->name }}</a></h4>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <form action=" {{ route('CustomLayout') }} " method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$shop->id}}"/>
                                    <button type="submit" class="btn btn-sm btn-outline-secondar">Edit</button></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

