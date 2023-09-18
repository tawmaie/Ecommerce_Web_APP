<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\ShopTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopTemplateController extends Controller
{
    function StoreTemplate(Request $request, Shop $shop)
    {
        // return [
        //     'user' => Auth::user(),
        //     'shop' => $shop,
        // ];
        $this->authorize('updateByOwner', $shop);

        $template = $shop->shopTemplate;
        if($template === null) {
            $template = new ShopTemplate();
            $template->shop()->associate($shop);
        }

        $data = $request->input();

        $template->fill($data);

        $template->save();

        return redirect()->route('custom')->with('success','Shop template have save successfuly');
    }
}
