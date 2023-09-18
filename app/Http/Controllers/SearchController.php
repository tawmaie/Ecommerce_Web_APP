<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Type;

class SearchController extends Controller
{
    public function searchproduct(Request $request)
    {
        $keyword = $request->input('keyword');
        $product = Product::query()
        ->where('id', 'LIKE', "%{$keyword}%")
        ->orWhere('name', 'LIKE', "%{$keyword}%")
        ->get();
        $type = Type::all();
        // return $product;
        return view('Home.Home' , [
            'products' => $product,
            'types' => $type,
        ]);
    }
    
}
