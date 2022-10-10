<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class ProductController extends Controller
{
    public function show(products $product){
        return view('products.show', compact('product'));
    }
}
