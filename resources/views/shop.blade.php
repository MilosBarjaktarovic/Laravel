@extends('layout')

@section('title', 'Prodavnica')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold">Prodavnica</h1>
</div>

{{-- Prikaz statusnih poruka --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

{{-- Mreža sa karticama proizvoda --}}
<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
    @forelse($products as $product)
    <div class="col">
        <div class="card h-100 shadow-sm border-0 rounded-3">

            {{-- Prikaz slike proizvoda uz pomoć asset helpera --}}
            <div class="d-flex align-items-center justify-content-center bg-white p-3" style="height: 200px;">
                @if(!empty($product['image']))
                <img src="{{ asset('storage/' . $product['image']) }}" alt="{{ $product['name'] }}" class="img-fluid" style="max-height: 100%; object-fit: contain;">
                @else
                <span class="text-muted small">Nema slike</span>
                @endif
            </div>

            <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-bold mb-1">{{ $product['name'] }}</h5>
                <p class="card-text text-muted small flex-grow-1">{{ $product['description'] }}</p>

                <div class="d-flex justify-content-between align-items-center my-2">
                    <span class="fs-5 fw-bold text-primary">{{ number_format($product['price'], 2) }} RSD</span>
                    <span class="badge {{ $product['amount'] > 0 ? 'bg-success' : 'bg-danger' }}">
                        {{ $product['amount'] > 0 ? 'Na stanju: ' . $product['amount'] : 'Nema na stanju' }}
                    </span>
                </div>

                @if($product['amount'] > 0)
                <form action="{{ route('cart.add') }}" method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">

                    <div class="input-group mb-2">
                        <span class="input-group-text">Količina</span>
                        <input type="number" name="quantity" value="1" min="1" max="{{ $product['amount'] }}" class="form-control text-center" required>
                    </div>

                    <button type="submit" class="btn btn-outline-primary w-100 fw-semibold">
                        Dodaj u korpu
                    </button>
                </form>
                @else
                <button class="btn btn-secondary w-100 mt-2" disabled>
                    Rasprodato
                </button>
                @endif
            </div>

        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info text-center py-4">
            Trenutno nema proizvoda u ponudi.
        </div>
    </div>
    @endforelse
</div>

@endsection
