<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
public function shopIndex()
{

    $products = \App\Models\Product::all();

    return view('shop', compact('products'));
}
}
