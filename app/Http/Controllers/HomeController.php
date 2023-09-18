<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type;
use App\Models\Shop;
use App\Models\User;

class HomeController extends Controller
{
    public function showitem()
    {
        $product = Product::all();
        $type = Type::all();
        return view('Home.Home',
            ['products' => $product],
            ['types' => $type],
        );
    }

    public function productDetail($id)
    {
        $product = Product::find($id);
        return view('Home.productDetail', ['product' => $product]);
    }

    public function AdminHome()
    {
        $product = Product::all();
        $type = Type::all();
        return view('Home.adminHome', 
            ['products' => $product], 
            ['types' => $type],
        );
    
    }
    public function custom()
    {
        $shop = Shop::where('user_id', '=', Auth::id())->get();
        return view('Home.Custom.index', ['shops' => $shop]);
    }

    public function OwnerHome()
    {
        $shop = Shop::where('user_id', '=', Auth::id())->get();
        $product = Product::all();
        $type = Type::all();
        return view(
            'Home.OwnerHome',
            ['products' => $product],
            ['types' => $type],
            ['shops' => $shop],
        );
    }

    public function AllShop()
    {
        $data = Shop::all();
        return view('Home.AllShop', ['shops' => $data],);
    }

    public function listbytype($id)
    {
        $type = Type::all();
        $product = Product::where('type_id', $id)->paginate(5);
        return view('Home.Home', ['products' => $product], ['types' => $type]);
    }

    

}
