<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request){

       $name = $request->name;


       $products = products::where('name', 'LIKE', "%" . $name . "%" )
       ->where('status', 2)
       ->paginate(8);

        return  view('search', compact('products'));
    }


}
