@extends('layouts.app')

@section('title', 'Dodaj proizvod')

@section('content')

<div class="card shadow">
    <div class="card-header bg-primary text-white">
        Dodaj proizvod
    </div>

    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('admin.store-product') }}">
            @csrf

            <div class="mb-3">
                <label>Naziv</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Cena</label>
                <input type="number" name="price" class="form-control">
            </div>

            <div class="mb-3">
                <label>Količina</label>
                <input type="number" name="amount" class="form-control">
            </div>

            <div class="mb-3">
                <label>Opis</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <button class="btn btn-success">Sačuvaj</button>
        </form>

    </div>
</div>

@endsection
