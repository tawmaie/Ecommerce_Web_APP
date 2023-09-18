<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class CustomizerController extends Controller
{
    const template = <<<'EOT'
@extends('layouts.main')

@section('categories')
    <div class="card bg-light mb-3">
        <div class="card-header bg-primary text-white text-uppercase"> Categories
        </div>
        <ul class="list-group category_block">
            @foreach ($types as $type)
                <li class="list-group-item"><a href="{{route('listbytypeshop',[$shop->id, $type->id])}}">{{ $type->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection

@section('categories2')
    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 mt-1">
        @foreach ($types as $type)
            <div class="col">
                <a href="{{route('listbytypeshop',[$shop->id, $type->id])}}"><div class="p-3 border bg-light" style="border-radius: 20px" >{{ $type->name }}</div></a>
            </div>
        @endforeach
    </div>
@endsection

@section('products')
    <div class="col">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-12 col-md-6 col-lg-4 mt-3">
                    <div class="card">
                        <img class="card-img-top" src="{{asset($product->img)}}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="{{route('productDetail',$product->id)}}" title="View Product">{{ $product->name }}</a></h4>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block">{{ $product->price }} Bath</p>
                                </div>
                                <div class="col">
                                    <a href="{{route('addtocart', $product->getKey())}}" class="btn btn-success btn-block">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
                <a class="nav-link d-flex align-items-center text-white" href="{{route('cart')}}"><i class="bi bi-cart3"></i> Cart</a>
            </li>
        </ul>
        </div>
        </div>
    </nav>
@endsection
    
EOT;

    public function CustomLayout(Request $request)
    {
        $shop = Shop::find($request->id);
        return view('Home.Custom.CustomLayout', [
            'shop' => $shop,
        ]);
    }

    public function showHome(Shop $shop)
    {
        $innerTemplate = $shop->shopTemplate?->html;
        $innerCss = $shop->shopTemplate?->css;

        $innerTemplate = preg_replace('/@/', '@@', $innerTemplate);
        $innerTemplate = preg_replace('/\{\{/', '@{{', $innerTemplate);

        $innerCss = preg_replace('/@/', '@@', $innerCss);
        $innerCss = preg_replace('/\{\{/', '@{{', $innerCss);

        $innerTemplate = preg_replace('/\<x\-yield[^\>]*\>products\<\/x\-yield\>/', "@yield('products')", $innerTemplate);
        $innerTemplate = preg_replace('/\<x\-yield[^\>]*\>categories\<\/x\-yield\>/', "@yield('categories')", $innerTemplate);
        $innerTemplate = preg_replace('/\<x\-yield[^\>]*\>categories2\<\/x\-yield\>/', "@yield('categories2')", $innerTemplate);


        $template = self::template .
            "@section('content')\n" .
            "<style>{$innerCss}</style>\n" .
            $innerTemplate .
            "@endsection\n";
        $product = Product::where('shop_id', $shop->id)->get();

        return Blade::render($template, [
            'shop' => $shop,
            'types' => $shop->types,
            'products' => $product,
        ]);
    
    }

    public function listbytypeshop(Shop $shop,Type $type)
    {
        $innerTemplate = $shop->shopTemplate?->html;
        $innerCss = $shop->shopTemplate?->css;

        $innerTemplate = preg_replace('/@/', '@@', $innerTemplate);
        $innerTemplate = preg_replace('/\{\{/', '@{{', $innerTemplate);

        $innerCss = preg_replace('/@/', '@@', $innerCss);
        $innerCss = preg_replace('/\{\{/', '@{{', $innerCss);

        $innerTemplate = preg_replace('/\<x\-yield[^\>]*\>products\<\/x\-yield\>/', "@yield('products')", $innerTemplate);
        $innerTemplate = preg_replace('/\<x\-yield[^\>]*\>categories\<\/x\-yield\>/', "@yield('categories')", $innerTemplate);
        $innerTemplate = preg_replace('/\<x\-yield[^\>]*\>categories2\<\/x\-yield\>/', "@yield('categories2')", $innerTemplate);

        $template = self::template .
            "@section('content')\n" .
            "<style>{$innerCss}</style>\n" .
            $innerTemplate .
            "@endsection\n";
        $product = Product::where('type_id', $type->id)->paginate(5);
        return Blade::render($template, [
            'shop' => $shop,
            'types' => $shop->types,
            'products' => $product, 
        ]);
    }
}
