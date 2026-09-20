@extends('layout')

@section('title')
Prodavnica
@endsection

@section('content')

@if(session('success'))
<p>{{ session('success') }}</p>
@endif

@if(session('error'))
<p>{{ session('error') }}</p>
@endif

<h1>Welcome to the Shop</h1>

<ul>

    @foreach($products as $product)

    <li>
        <strong>{{ $product['name'] }}</strong>
    </li>

    <li>
        Opis: {{ $product['description'] }}
    </li>

    <li>
        Cena: {{ $product['price'] }}
    </li>

    <li>
        Stanje: {{ $product['amount'] }}
    </li>

    <li>
        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" width="100">
    </li>

    <form action="{{ route('cart.add') }}" method="POST">

        @csrf

        <input type="hidden" name="product_id" value="{{ $product['id'] }}">

        <label for="quantity-{{ $product['id'] }}">
            Količina:
        </label>

        <input type="number" id="quantity-{{ $product['id'] }}" name="quantity" value="1" min="1" max="{{ $product['amount'] }}">

        <button type="submit">
            Dodaj u korpu
        </button>

    </form>

    <br>

    @endforeach

</ul>

@endsection
