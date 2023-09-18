<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\User;

class ShopController extends Controller
{
    public function index(Shop $shop)
    {
        $this->authorize('list', Shop::class);

        $data = Shop::paginate(5);
        return view('shop.index', ['shops' => $data]);
    }

    public function create(Shop $shop)
    {
        $this->authorize('create');

        $users = User::all();
        return view('shop.create', ['users' => $users]);
    }

    public function store(Request $request, Shop $shop, User $user)
    {
        $this->authorize('create', Shop::class);

        $shop = new Shop;
        $data = $request->input();
        $shop->fill($data);
        $user = User::findOrFail($data['user_id']);
        $shop->user()->associate($user);
        $shop->save();
        return redirect()->route('shops.index')->with('success', 'Shop has been created successfuly');
    }

    public function edit(Shop $shop)
    {
        $this->authorize('update', Shop::class);

        $users = User::all();
        return view('shop.edit', compact('shop'), ['users' => $users]);
    }

    public function update(Request $request, Shop $shop)
    {
        $this->authorize('update', Shop::class);

        $data = $request->input();
        $shop->fill($data);
        $user = User::findOrFail($data['user_id']);
        $shop->user()->associate($user);
        $shop->save();
        return redirect()->route('shops.index')->with('success', 'Shop has been updated successfuly');
    }

    public function destroy(Shop $Shop)
    {
        $this->authorize('delete', Shop::class);

        $Shop->delete();
        return redirect()->route('shops.index')->with('success', 'Shop has been deleted successfuly');
    }

    public function createshop()
    {
        return view('shop.usercreate');
    }

    public function usercreateshop(Request $request)
    {
        $shop = new Shop;
        if ($request->hasFile('logo')) {
            $path = public_path('shoplogo');
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $file->move($path, $fileName);
            $shop->logo = "shoplogo/" . $fileName;
        } else {
            $shop->logo = "ProductImg/No_Image.jpg";
        }
        $user = User::findorFail(Auth::id());
        $shop->name = $request->name;
        $shop->user_id = $user->id;
        $user->role = "OWNER";
        $user->save();
        $shop->save();

        return redirect()->route('OwnerHome')->with('success', 'Shop has been created successfuly');
    }

    
}
