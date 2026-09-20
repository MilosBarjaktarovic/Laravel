<?php

namespace App\Repositories;

use App\Models\ShopCart;

class ShopCartRepository
{
    public function create(array $data)
    {
        $cartItem = ShopCart::where('product_id', $data['product_id'])->first();

        if ($cartItem) {
            $cartItem->quantity += $data['quantity'];
            $cartItem->save();

            return $cartItem;
        }

        return ShopCart::create($data);
    }

    public function getAll()
    {
        return ShopCart::with('product')->get();
    }

    public function getByProductId($productId)
    {
        return ShopCart::where('product_id', $productId)->first();
    }

    public function delete($id)
    {
        $cartItem = ShopCart::findOrFail($id);
        $cartItem->delete();
    }
}
