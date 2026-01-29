@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="/admin/add-product">
    @csrf

    <input type="text" name="name" placeholder="Naziv">
    <input type="number" name="price" placeholder="Cena">
    <textarea name="description" placeholder="Opis"></textarea>

    <button type="submit">Sačuvaj</button>
</form>
