<h2>Izmeni proizvod</h2>

<form method="POST" action="{{ route('admin.products.update', $product->id) }}">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $product->name }}">
    <input type="number" name="price" value="{{ $product->price }}">
    <textarea name="description">{{ $product->description }}</textarea>

    <button type="submit">Sačuvaj izmene</button>
</form>
