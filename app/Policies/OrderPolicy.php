<?php

namespace App\Policies;

use App\Models\Orders;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
    //  * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    public function author(User $user, Orders $order){
       return true;
    }
}
