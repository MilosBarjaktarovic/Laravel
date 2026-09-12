@extends('layout')

@section('title')
Glavna stranica
@endsection

@section('content')

<div class="text-center py-5">

    <h1 class="display-4">Dobrodošli u MyShop</h1>

    <p class="lead">
        Dobrodošli na glavnu stranicu naše aplikacije.
    </p>

    <a href="{{ route('ocene.index') }}" class="btn btn-primary">
        Pogledaj ocene
    </a>

</div>

@endsection
