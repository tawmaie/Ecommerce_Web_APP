<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use App\Policies\ProductPolicy;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
  public function index(Shop $shop)
  {
    $this->authorize('list', [new Product(), $shop]);

    $data = $shop->products()->paginate(5);
    return view('product.index', ['products' => $data]);
  }

  public function create(Shop $shop)
  {
    $this->authorize('create', [new Product(), $shop]);

    $types = $shop->types;
    return view('product.create', ['types' => $types]);
  }

  public function edit(Shop $shop, Product $product)
  {
    $this->authorize('update', $product);

    $types = $shop->types;
    return view('product.edit', compact('product'), ['types' => $types]);
  }

  public function update(Request $request, Shop $shop, Product $product)
  {
    $this->authorize('update', $product);
    $product->fill($request->input());
    if ($request->hasFile('img')) {
      $path = public_path('ProductImg');
      $file = $request->file('img');
      $fileName = $file->getClientOriginalName();
      $file->move($path, $fileName);
      $product->img = "ProductImg/" . $fileName;
    } 
    $type = $shop->types()->find($request['type_id']);
    if ($type === null) {
      return redirect()->back()->withInput()->with('error', 'Type is not in this shop.');
    }
    $product->type()->associate($type);
    $product->save();
    return redirect()->route('shops.product.index', [
      'shop' => $shop->getKey(),
    ])->with('success', 'Product has been updated successfuly');
  }

  public function destroy(Shop $shop, Product $product)
  {
    $this->authorize('delete', $product);

    $product->delete();
    return redirect()->route('shops.product.index', [
      'shop' => $shop->getKey(),
    ])->with('success', 'Product has been deleted successfuly');
  }

  public function store(Request $request, Shop $shop)
  {
    $this->authorize('create', [new Product(), $shop]);
    $product = new Product;

    if ($request->hasFile('img')) {
      $path = public_path('ProductImg');
      $file = $request->file('img');
      $fileName = $file->getClientOriginalName();
      $file->move($path, $fileName);
      $product->img = "ProductImg/" . $fileName;
    } else {
      $product->img = "ProductImg/No_Image.jpg";
    }
    $product->fill($request->input());
    $type = $shop->types()->find($request['type_id']);
    if ($type === null) {
      return redirect()->back()->withInput()->with('error', 'Type is not in this shop.');
    }
    $product->type()->associate($type);

    $shop->products()->save($product);

    return redirect()->route('shops.product.index', [
      'shop' => $shop->getKey(),
    ])->with('success', 'Product has been created successfuly');
  }

  public function searchproduct(Request $request)
  {
    $keyword = $request->input('keyword');
    $shops = Product::find()
      ->where('name', '=', $keyword)
      ->orWhere('name', 'like', "{$keyword}%")
      ->get();

    return route('shops.product.index', compact('shops'));
  }


}
