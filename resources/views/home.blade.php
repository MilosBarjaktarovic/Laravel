@extends('layout')

@section('title', 'Home')

@section('content')
<h2 class="mb-4">Latest Products</h2>

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p><strong>Price:</strong> ${{ $product->price }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
