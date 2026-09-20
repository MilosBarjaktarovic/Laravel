<h1>{{ $product->name }}</h1>

<p>Cena: {{ $product->price }}</p>

<p>Opis:</p>
<p>{{ $product->description }}</p>

<p>Količina: {{ $product->amount }}</p>

<a href="{{ route('admin.products') }}">
    Nazad na proizvode
</a>

<form action="{{ route('cart.add') }}" method="POST">
    @csrf

    <input type="number" name="quantity" value="1" min="1" max="{{ $product->amount }}">

    <input type="hidden" name="product_id" value="{{ $product->id }}">

    <button type="submit">
        Dodaj u korpu
    </button>
</form>
