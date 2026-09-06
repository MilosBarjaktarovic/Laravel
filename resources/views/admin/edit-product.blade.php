@extends('layout')

@section('title', 'Edit Product')

@section('content')

<div class="container my-5">

    <h2 class="mb-4">Edit Product</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>

            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>

            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>

            <textarea name="description" class="form-control" rows="5">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Amount</label>

            <input type="number" name="amount" class="form-control" value="{{ old('amount', $product->amount) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">New Image</label>

            <input type="file" name="image" class="form-control">
        </div>

        @if ($product->image)
        <div class="mb-3">
            <p>Current image:</p>

            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="150">
        </div>
        @endif

        <div class="d-flex gap-2">

            <button type="submit" class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('admin.products') }}" class="btn btn-secondary">
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection
