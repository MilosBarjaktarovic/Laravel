<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function create()
    {
        return view('admin.add-product');
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('products', 'public');
        }

        $this->productRepo->create($data);

        return redirect()
            ->route('admin.products')
            ->with('success', 'Proizvod dodat!');
    }

    public function index()
    {
        $products = $this->productRepo->getAll();

        return view('admin.products', compact('products'));
    }

    public function destroy($id)
    {
        $this->productRepo->delete($id);

        return redirect()
            ->route('admin.products')
            ->with('success', 'Proizvod obrisan!');
    }

    public function edit($id)
    {
        $product = $this->productRepo->findById($id);

        return view('admin.edit-product', compact('product'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('products', 'public');
        }

        $this->productRepo->update($id, $data);

        return redirect()
            ->route('admin.products')
            ->with('success', 'Proizvod uspešno izmenjen.');
    }
}
