@extends('layout')

@section('title')
Korpa
@endsection

@section('content')

<div class="container mt-4">

    <h1 class="mb-4">🛒 Moja korpa</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if($cartItems->isEmpty())

    <div class="alert alert-info">
        Korpa je prazna.
    </div>

    @else

    @foreach($cartItems as $cartItem)

    <div class="card mb-3 shadow-sm">

        <div class="card-body">

            <div class="row align-items-center">

                <div class="col-md-2">
                    <img src="{{ $cartItem->product->image }}" alt="{{ $cartItem->product->name }}" class="img-fluid">
                </div>

                <div class="col-md-4">

                    <h4>
                        {{ $cartItem->product->name }}
                    </h4>

                    <p class="mb-1">
                        Cena:
                        <strong>
                            {{ $cartItem->product->price }} din
                        </strong>
                    </p>

                    <p class="mb-0">
                        Količina:
                        <strong>
                            {{ $cartItem->quantity }}
                        </strong>
                    </p>

                </div>

                <div class="col-md-3">

                    <p class="mb-0">
                        Ukupno:
                    </p>

                    <h4>
                        {{ $cartItem->product->price * $cartItem->quantity }} din
                    </h4>

                </div>

                <div class="col-md-3 text-md-end">

                    <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            🗑️ Obriši
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    @endforeach

    <div class="card shadow-sm mt-4">

        <div class="card-body text-end">

            <h3>
                Ukupno za plaćanje:
                <strong>
                    {{ $cartItems->sum(function ($cartItem) {
                            return $cartItem->product->price * $cartItem->quantity;
                        }) }}
                    din
                </strong>
            </h3>

        </div>

    </div>

    @endif

</div>

@endsection
