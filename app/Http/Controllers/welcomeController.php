<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Orders;

class welcomeController extends Controller
{
    public function __invoke(){

        if (auth()->user()) {

            $pendiente = Orders::where('status', 1)->where('user_id', auth()->user()->id)->count();

            if ($pendiente) {

                $mensaje = "Usted tiene $pendiente ordenes pendientes <a class='font-bold' href='". route('orders.index') ."?status=1'>Ir a pagar</a>";

                session()->flash('flash.banner', $mensaje);
            }

        }


        $categories = category::all();

        return view('welcome', compact('categories'));
    }

}
