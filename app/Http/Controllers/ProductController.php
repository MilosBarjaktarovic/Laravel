<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.add-product');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'amount' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'amount' => $request->amount,
            'image' => $request->hasFile('image') ? $request->file('image')->store('products', 'public') : null,
        ]);

        return redirect('/admin/products')->with('success', 'Proizvod dodat!');
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
        
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/admin/products')->with('success', 'Proizvod obrisan!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit-product', compact('product'));
    }
}
