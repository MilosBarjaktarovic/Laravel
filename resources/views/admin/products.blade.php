@extends('layouts.app')

@section('title', 'Proizvodi')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card shadow">
    <div class="card-header bg-dark text-white">
        Lista proizvoda
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Naziv</th>
                    <th>Cena</th>
                    <th>Količina</th>
                    <th>Opis</th>
                    <th>Akcije</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->description }}</td>
                    <td>

                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm">
                            Izmeni
                        </a>

                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Da li ste sigurni?')">
                                Obriši
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.products.create') }}" class="btn btn-success">
            Dodaj novi proizvod
        </a>
    </div>
</div>

@endsection
