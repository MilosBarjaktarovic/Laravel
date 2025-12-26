<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
public function index()
{

$products = [
    [
        'name'=>"iPhone 14",
        'discount' => true
    ],
    [
        'name'=>"iPhone 13 pro",
        'discount' => true
    ],
    [
        'name'=>"Samsung Galaxy S22",
        'discount' => false
    ],
    [
        'name'=>"Samsung A54",
        'discount' => false
    ]
];

    return view('shop', compact('products'));
}
}
