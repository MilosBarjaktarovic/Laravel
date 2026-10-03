<?php

namespace App\Repositories;

use App\Models\ShopCart;

class ShopCartRepository
{
    public function create(array $data)
    {
        $cartItem = ShopCart::where('user_id', auth()->id())
            ->where('product_id', $data['product_id'])
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $data['quantity'];
            $cartItem->save();

            return $cartItem;
        }

        $data['user_id'] = auth()->id();

        return ShopCart::create($data);
    }

    public function getAll()
    {
        return ShopCart::with('product')
            ->where('user_id', auth()->id())
            ->get();
    }

    public function getByProductId($productId)
    {
        return ShopCart::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();
    }

    public function delete($id)
    {
        $cartItem = ShopCart::where('user_id', auth()->id())
            ->findOrFail($id);

        $cartItem->delete();
    }
}
