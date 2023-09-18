<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('user.index', ['users' => $data]);
    }


    public function edit(User $user)
    {
        $this->authorize('update', Shop::class);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', Shop::class);

        $data = $request->input();
        $user->fill($data);
        $user->save();
        return redirect()->route('user.index')->with('success', 'Shop has been updated successfuly');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', Shop::class);

        $user->delete();
        return redirect()->route('shops.index')->with('success', 'Shop has been deleted successfuly');
    }

    public function regis(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'USER';
        $user->save();
        return redirect()->route('login')->with('success', 'Product has been updated successfuly');
    }
}
