<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Ordercontroller;
use App\Models\category;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\ShopingCart;
use Laravel\Socialite\Facades\Socialite;

use App\Models\Orders;
use Symfony\Component\Routing\Route as ComponentRoutingRoute;
use App\Http\Livewire\PaymentOrder;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

Route::get('/', welcomeController::class);

Route::get('search', [SearchController::class, 'show'])->name('search');

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('shoping-cart', ShopingCart::class)->name('shoping-cart');

Route::get('login/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('login/google/callback', function () {
    $user = Socialite::driver('google')->user();


    $userExist = User::where('external_id', $user->id)->where('external_auth', 'google')->first();

    if($userExist){

        Auth::login($userExist);
    }else{

        $userNew = User::create([

            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'external_id' => $user->id,
            'external_auth' => 'google',
        ]);

        Auth::login($userNew);

    }

    return redirect('/');

    // $user->token
});


Route::middleware(['auth'])->group(function(){

    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

    Route::get('orders/create', CreateOrder::class)->name('orders.create');

    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('orders/{order}/payment', PaymentOrder::class)->name('orders.payment');

    // Route::get('orders/{order}/pay', [OrderController::class, 'pay'])->name('orders.pay');

    // Route::post('webhooks', WebhooksController::class);

});


Route::post('reviews/{product}', [ReviewController::class, 'store'])->name('reviews.store');
