@extends('layout')

@section('title', 'Add Product')

@section('content')

<div class="container my-5">

    <h2 class="mb-4">Add Product</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>

            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>

            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>

            <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Amount</label>

            <input type="number" name="amount" class="form-control" value="{{ old('amount') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>

            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Add Product
        </button>

    </form>

</div>

@endsection
