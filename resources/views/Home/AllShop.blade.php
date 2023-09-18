@extends('layouts.main')

@section('content')
    <h1 class="text-center">All Shop</h1>
    <div class="container">
        <div class="row">
            @foreach ($shops as $shop)
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card mt-5" style="border-radius: 10px; ">
                        <img class="card-img-top" src="{{asset($shop->logo)}}" alt="Card image cap" style="border-radius: 50%">
                        <div class="card-body text-center">
                            <h4 class="card-body"><a href="{{route('showHome',$shop->getKey())}}" title="View Product">{{$shop->name}}</a></h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
