<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class OwnerController extends Controller
{
    public function ListShop()
    {
        $data = Shop::orderBy('name')->whereHas('user', function ($userQuery) {
            $userQuery->where((new User())->getKeyName(), Auth::id());
        })->paginate(5);

        return view('shop.ownerShop', ['shops' => $data]);
    }

    public function stock()
    {
        $data = Shop::orderBy('name')->whereHas('user', function ($userQuery) {
            $userQuery->where((new User())->getKeyName(), Auth::id());
        })->paginate(5);
        return view('product.stock.index', ['shops' => $data]);
    }

    public function viewstock(Shop $shop)
    {

        $data = $shop->products()->paginate(5);
        return view('product.stock.viewstock', ['products' => $data]);
    }

    public function updatestock(Request $request)
    {
        $product = Product::find($request->id);
        $product->stock = $request->stock;
        $product->save();
        $shop = $product->shop_id;
        return redirect()->route('viewstock', [
            'shop' => $shop,
        ])->with('success', 'Stock has been updated successfuly');
    }

    public function ShopSetting()
    {
        $data = Shop::orderBy('name')->whereHas('user', function ($userQuery) {
            $userQuery->where((new User())->getKeyName(), Auth::id());
        })->paginate(5);

        return view('shop.ownerShopSetting', ['shops' => $data]);
    }

    public function editshop(Shop $shop)
    {
        $data = Shop::findorFail($shop->id);
        return view('shop.ownerupdate', ['shop' => $data]);
    }

    public function ownerupdateshop(Request $request, Shop $shop, User $user)
    {
        if ($request->hasFile('logo')) {
            $path = public_path('shoplogo');
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $file->move($path, $fileName);
            $shop->logo = "shoplogo/" . $fileName;
        }
        $shop->name = $request->name;
        // $shop->user()->associate($user);
        $shop->save();

        return redirect()->route('ShopSetting')->with('success', 'Shop has been updated successfuly');
    }
}
