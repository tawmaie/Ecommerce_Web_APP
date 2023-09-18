<?php

namespace App\Policies;

use App\Models\Shop;
use App\Models\Type;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypePolicy
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
    public function list(User $user, Type $dummy, Shop $shop)
    {
        return $shop->user->getKey() === $user->getKey();
    }

    public function create(User $user, Type $dummy, Shop $shop)
    {
        return $shop->user->getKey() === $user->getKey();
    }

    public function update(User $user, Type $type)
    {
        return $type->shop->user->getKey() === $user->getKey();
    }

    public function delete(User $user, Type $type)
    {
        return $type->shop->user->getKey() === $user->getKey();
    }
}
