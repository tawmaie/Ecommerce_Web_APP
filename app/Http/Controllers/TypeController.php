<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Shop;
use Illuminate\Support\Facades\Route;

class TypeController extends Controller
{
  public function index(Shop $shop)
  {
    $this->authorize('list', [new Type(), $shop]);
    
    $data = $shop->types()->paginate(5);
    return view('product.type.index', ['types' => $data]);
  }

  public function create(Shop $shop)
  {
    $this->authorize('create', [new Type(), $shop]);

    return view("product.type.create");
  }

  public function store(Request $request, Shop $shop)
  {
    $this->authorize('create', [new Type(), $shop]);

    $type = new Type;

    $type->fill($request->input());
    $shop->types()->save($type);

    return redirect()->route('shops.type.index', [
      'shop' => $shop->getKey(),
    ])->with('success', 'Product type has been crested successfuly');
  }

  public function edit(Shop $shop, Type $type)
  {
    $this->authorize('update', $shop);

    return view('product.type.edit', compact('type'));
  }

  public function update(Request $request,Shop $shop, Type $type)
  {

    $type->fill($request->input());
    $type->save();

    return redirect()->route('shops.type.index', [
      'shop' => $shop->getKey(),
    ])->with('success', 'Product type has been updated successfuly');
  }

  public function destroy(Shop $shop, Type $type)
  {
    $this->authorize('delete', $type);

    $type->delete();
    return redirect()->route('shops.type.index', [
      'shop' => $shop->getKey()
      ,])->with('success', 'Product has been deleted successfuly');
  }





  public function search(){
        
  }
}
