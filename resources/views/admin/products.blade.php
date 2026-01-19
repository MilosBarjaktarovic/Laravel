@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table border="1">
    <tr>
        <th>ID</th>
        <th>Naziv</th>
        <th>Cena</th>
        <th>Opis</th>
    </tr>

    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->description }}</td>
    </tr>
    @endforeach
</table>
<a href="/admin/add-product">Dodaj novi proizvod</a>
