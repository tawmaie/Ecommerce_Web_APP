<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\Shop;
use App\Models\ShopTemplate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function list(User $user, Product $dummy, Shop $shop)
    {
        return $shop->user->getKey() === $user->getKey();
    }

    public function create(User $user, Product $dummy, Shop $shop)
    {
        return $shop->user->getKey() === $user->getKey();
    }

    public function update(User $user, Product $product)
    {
        return $product->shop->user->getKey() === $user->getKey();
    }

    public function delete(User $user, Product $product)
    {
        return $product->shop->user->getKey() === $user->getKey();
    }

    public function updateTemplate(User $user, ShopTemplate $shopTemplate)
    {
        return $shopTemplate->shop->user->getKey() === $user->getKey();
    }
}
