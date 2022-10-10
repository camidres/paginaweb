<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        $orders = Orders::query()->where('status', '<>', 1);

        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders = $orders->get();


        $pendiente = Orders::where('status', 1)->count();
        $recibido = Orders::where('status', 2)->count();
        $enviado = Orders::where('status', 3)->count();
        $entregado = Orders::where('status', 4)->count();
        $anulado = Orders::where('status', 5)->count();

        return view('admin.orders.index', compact('orders', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado'));
    }

    public function show(Orders $order){
        return view('admin.orders.show', compact('order'));
    }
}
