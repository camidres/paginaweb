<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class Ordercontroller extends Controller
{



    public function index()
    {

        $orders = Orders::query()->where('user_id', auth()->user()->id);

        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders = $orders->get();


        $pendiente = Orders::where('status', 1)->where('user_id', auth()->user()->id)->count();
        $recibido = Orders::where('status', 2)->where('user_id', auth()->user()->id)->count();
        $enviado = Orders::where('status', 3)->where('user_id', auth()->user()->id)->count();
        $entregado = Orders::where('status', 4)->where('user_id', auth()->user()->id)->count();
        $anulado = Orders::where('status', 5)->where('user_id', auth()->user()->id)->count();


        return view('orders.index', compact('orders', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado'));
    }





    public function show(Orders $order)
    {
        // $this->authorize('author', $order);


        $items = json_decode($order->content);
        $envio = json_decode($order->envio);

        return view('orders.show', compact('order', 'items', 'envio'));
    }
}
