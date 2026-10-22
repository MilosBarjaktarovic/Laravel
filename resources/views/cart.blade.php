@extends('layout')

@section('title', 'Vaša korpa')

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <h1 class="fw-bold">Vaša korpa</h1>
    </div>

    {{-- Poruke o uspehu ili grešci --}}
    @if(session('success'))
    <div class="col-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="col-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    @if($errors->has('cart'))
    <div class="col-12">
        <div class="alert alert-danger">
            {{ $errors->first('cart') }}
        </div>
    </div>
    @endif

    @if($cartItems->isEmpty())
    <div class="col-12">
        <div class="card shadow-sm border-0 py-5 text-center">
            <div class="card-body">
                <h4 class="text-muted mb-3">Vaša korpa je trenutno prazna.</h4>
                <a href="{{ route('shop') }}" class="btn btn-primary px-4 py-2">
                    Pogledaj ponudu u prodavnici
                </a>
            </div>
        </div>
    </div>
    @else
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 100px;">Slika</th>
                            <th scope="col">Proizvod</th>
                            <th scope="col">Cena</th>
                            <th scope="col" class="text-center">Količina</th>
                            <th scope="col">Ukupno</th>
                            <th scope="col" class="text-end">Akcija</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $grandTotal = 0; @endphp
                        @foreach($cartItems as $item)
                        @php
                        $itemTotal = $item->product ? ($item->product->price * $item->quantity) : 0;
                        $grandTotal += $itemTotal;
                        @endphp
                        <tr>
                            {{-- Prikaz slike proizvoda --}}
                            <td>
                                @if($item->product && !empty($item->product->image))
                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="img-thumbnail rounded" style="width: 70px; height: 70px; object-fit: contain;">
                                @else
                                <div class="bg-light text-muted d-flex align-items-center justify-content-center rounded" style="width: 70px; height: 70px; font-size: 11px;">
                                    Bez slike
                                </div>
                                @endif
                            </td>

                            {{-- Naziv proizvoda --}}
                            <td>
                                <h6 class="mb-0 fw-bold">{{ $item->product->name ?? 'Proizvod obrisan' }}</h6>
                            </td>

                            {{-- Cena po komadu --}}
                            <td>
                                {{ number_format($item->product->price ?? 0, 2) }} RSD
                            </td>

                            {{-- Količina --}}
                            <td class="text-center">
                                <span class="badge bg-secondary fs-6 px-3 py-2">
                                    {{ $item->quantity }}
                                </span>
                            </td>

                            {{-- Ukupno za datu stavku --}}
                            <td class="fw-bold text-primary">
                                {{ number_format($itemTotal, 2) }} RSD
                            </td>

                            {{-- Ukloni iz korpe --}}
                            <td class="text-end">
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Da li ste sigurni da želite da uklonite ovaj proizvod?')">
                                        Ukloni
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Desna strana: Pregled porudžbine i Checkout --}}
    <div class="col-lg-4">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3">Pregled porudžbine</h5>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Ukupno za plaćanje:</span>
                    <span class="fs-4 fw-bold text-success">{{ number_format($grandTotal, 2) }} RSD</span>
                </div>

                <hr>

                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success w-100 py-2 fs-5 fw-semibold shadow-sm">
                        Završi kupovinu
                    </button>
                </form>

                <a href="{{ route('shop') }}" class="btn btn-link w-100 mt-2 text-decoration-none">
                    &larr; Nastavi sa kupovinom
                </a>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
