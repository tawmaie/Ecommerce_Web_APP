<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout()
    {
        return view('Order.Summary');
    }

    public function OrderPlacement(Request $request,User $user)
    {
        $order = new Order;
        $order->user_id = Auth::id();
        $order->Fname = $request->fname;
        $order->Lname = $request->lname;
        $order->Address = $request->address . ' ' .  $request->address2 . ' ' . $request->state . ' ' . $request->city . ' ' . $request->city . ' ' . $request->zip;
        $order->total = $request->total;
        $order->save();
        $carts = session()->get('cart');
        foreach ($carts as $cart){
            $product = Product::find($cart['p_id']);
            $newStock = $product->stock - $cart['quantity'];
            $product->stock = $newStock;
            $product->save();
            $order_detail = new OrderDetail;
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $product->id;
            $order_detail->shop_id = $product->shop_id;
            $order_detail->product_name = $product->name;
            $order_detail->amount = $cart['quantity'];
            $order_detail->price = $product->price;
            $order_detail->save();
        }
        session()->forget('cart');
        return view('Order.Billing', [
            'order' => $order,
            'carts' => $carts,
        ]);
    }
}
