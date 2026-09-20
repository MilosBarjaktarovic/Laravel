<?php

namespace App\Http\Controllers;

use App\Repositories\ShopCartRepository;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $shopCartRepo;

    public function __construct(ShopCartRepository $shopCartRepo)
    {
        $this->shopCartRepo = $shopCartRepo;
    }

    public function index()
    {
        $cartItems = $this->shopCartRepo->getAll();

        return view('cart', compact('cartItems'));
    }

    
    public function addToCart(Request $request)
    {
    $product = Product::findOrFail($request->product_id);

    $quantity = $request->quantity;

    $cartItem = $this->shopCartRepo->getByProductId($product->id);

    $currentQuantity = $cartItem ? $cartItem->quantity : 0;

    if ($currentQuantity + $quantity > $product->amount) {
    return back()->with('error', 'Nema dovoljno proizvoda na stanju.');
    } 
  
    $this->shopCartRepo->create([
    'product_id' => $product->id,
    'quantity' => $quantity,
    ]);

    return back()->with('success', 'Proizvod je dodat u korpu.');
    }

    public function remove($id)
    {
        $this->shopCartRepo->delete($id);

        return back()->with('success', 'Proizvod je uspesno uklonjen iz korpe.');
    }
    

}
