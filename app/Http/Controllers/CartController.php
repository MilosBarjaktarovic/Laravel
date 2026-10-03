<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Repositories\ShopCartRepository;
use App\Models\Product;
use App\Repositories\ProductRepository;

class CartController extends Controller
{
    private $shopCartRepo;
    private $productRepo;

    public function __construct(ShopCartRepository $shopCartRepo, ProductRepository $productRepo)
    {
        $this->shopCartRepo = $shopCartRepo;
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        $cartItems = $this->shopCartRepo->getAll();

        return view('cart', compact('cartItems'));
    }

    public function addToCart(AddToCartRequest $request)
    {
        $validated = $request->validated();

        $product = Product::findOrFail($validated['product_id']);

        $quantity = $validated['quantity'];

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

        return back()->with('success', 'Proizvod je uspešno uklonjen iz korpe.');
    }

    public function checkout()
    {
    $cartItems = $this->shopCartRepo->getAll();

    if ($cartItems->isEmpty()) {
    return back()->with('error', 'Korpa je prazna.');
    }

    foreach ($cartItems as $cartItem) {

    $product = $this->productRepo->findById($cartItem->product_id);

    if ($cartItem->quantity > $product->amount) {
    return back()->with(
    'error',
    'Nema dovoljno proizvoda na stanju za: ' . $product->name
    );
    }
    }

    foreach ($cartItems as $cartItem) {

    $this->productRepo->decreaseAmount(
    $cartItem->product_id,
    $cartItem->quantity
    );

    $this->shopCartRepo->delete($cartItem->id);
    }

    return redirect()
    ->route('cart.index')
    ->with('success', 'Hvala što ste kupovali kod nas!');
    }
    
}
