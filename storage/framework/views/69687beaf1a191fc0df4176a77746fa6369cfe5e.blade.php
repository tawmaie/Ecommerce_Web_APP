@extends('layouts.main')

@section('categories')
<div class="card mt-3">
    <div class="card-header bg-primary text-white text-uppercase"> Categories </div>
    <ul class="list-group">
        @foreach (range(1, 8) as $i)
            <li class="list-group-item"><a href="{{route('home1')}}">Type {{ $i }}</a></li>
        @endforeach
    </ul>
</div>
@endsection

@section('promotion')
<div class="card mt-3">
    <div class="card-header bg-primary text-white text-uppercase"> Promotion </div>
    <div class="container-top">
        <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach (range(1, 3) as $item)
                    <div class="carousel-item active">
                        <a href="{{route('product')}}">
                            <img src="{{ asset('images/promotion-sm.jpg') }}" class="d-block" alt="...">
                        </a>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
@endsection

@section('products')
<div class="row">
    @foreach (range(1, 6) as $i)
        <div class="col-md-4 col-sm-6 mt-3">
            <div class="card">
                <img class="card-img-top" src="https://i.imgur.com/O0GMYuw.jpg" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title"><a href="{{route('product')}}" title="View Product">Product{{$i}}</a></h4>
                    <div class="row">
                        <div class="col">
                            <p class="btn btn-danger btn-block">10000 Bath</p>
                        </div>
                        <div class="col">
                            <a href="#" class="btn btn-success btn-block">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

@section('header')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-3">
                    <li class="nav-item">
                        <a class="nav-link active d-flex align-items-center text-white" aria-current="page"
                            href="#"><i class="fas fa-bars pe-2"></i>Menu</a>
                    </li>
                </ul>
                <form class="d-flex align-items-center w-100 form-search">
                    <input type="search" class="form-control" placeholder="Search" aria-label="Search" />
            </div>
            <a href="#" class="text-white"><i class="fas fa-search ps-3"></i></a>
            </form>

            <ul class="navbar-nav ms-3">
                <li class="nav-item" style="width: 65px;">
                    <a class="nav-link d-flex align-items-center text-white" href="#!">Cart</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <div class="container">
        <div class="row text-center">
            <img src="{{ asset('images/banner.jpg') }}" class="img-fluid center-block" alt="...">
        </div>
    </div>
@endsection
    @section('content')
<body id="ismk"><div class="gjs-row" id="iz2i"><div class="gjs-cell"></div></div><div class="gjs-row" id="iacd"><div class="gjs-cell"></div><div class="gjs-cell"></div></div><div class="gjs-row" id="ivsl"><div class="gjs-cell"></div><div class="gjs-cell">@yield('products')
                </div><div class="gjs-cell"></div></div></body>@endsection
