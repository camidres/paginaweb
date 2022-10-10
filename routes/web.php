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
use App\Models\Orders;
use Symfony\Component\Routing\Route as ComponentRoutingRoute;
use App\Http\Livewire\PaymentOrder;
use App\Models\Review;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

Route::get('/', welcomeController::class);

Route::get('search', [SearchController::class, 'show'])->name('search');

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('shoping-cart', ShopingCart::class)->name('shoping-cart');


Route::middleware(['auth'])->group(function(){

    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

    Route::get('orders/create', CreateOrder::class)->name('orders.create');

    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('orders/{order}/payment', PaymentOrder::class)->name('orders.payment');

    // Route::get('orders/{order}/pay', [OrderController::class, 'pay'])->name('orders.pay');

    // Route::post('webhooks', WebhooksController::class);

});


Route::post('reviews/{product}', [ReviewController::class, 'store'])->name('reviews.store');
