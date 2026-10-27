@extends('layout')

@section('title', 'Home')

@section('content')
<h2 class="mb-4">Latest Products</h2>

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <!-- Dodajemo prikaz slika ako postoji kolona image u bazi -->
            @if(!empty($product->image))
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
            @endif

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
