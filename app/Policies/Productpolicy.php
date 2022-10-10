<?php

namespace App\Policies;

use App\Models\Orders;
use App\Models\products;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Productpolicy
{
    use HandlesAuthorization;


    public function review(User $user, products $product)
    {

        // $orders = Orders::where('user_id', $user->id)->select('content')->get()->map(function ($order) {

        //     return json_decode($order->content, true);
        // });

        // $products = $orders->collapse();

        // return $products->contains('id', $product->id);
    }
}
