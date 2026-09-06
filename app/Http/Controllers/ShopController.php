<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;

class ShopController extends Controller
{
    private $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function shopIndex()
    {
        $products = $this->productRepo->getAll();

        return view('shop', compact('products'));
    }
}
