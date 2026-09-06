<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;

class HomeController extends Controller
{
    private $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function homeIndex()
    {
        $products = $this->productRepo->getLatestProducts();

        return view('home', compact('products'));
    }
}
