<?php

namespace App\Policies;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShopPolicy
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

    public function list(User $user)
    {
        return $user->isAdministrator();
    }

    public function listByOwner(User $user)
    {
        return $user->isAdministrator() || $user->isShopOwner();
    }

    public function create(User $user)
    {
        return $user->isAdministrator();
    }

    public function update(User $user)
    {
        return $user->isAdministrator();
    }

    public function updateByOwner(User $user, Shop $shop)
    {
        return $shop->user?->getKey() === $user->getKey();
    }

    public function delete(User $user)
    {
        return $user->isAdministrator();
    }
}
