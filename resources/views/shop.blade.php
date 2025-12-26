@extends('layout')

@section('title')

Prodavnica

@endsection


@section('content')

<p>Welcome to ur shop page!!!</p>

<ul>
    @foreach($products as $product)
    <li>{{$product ['name']}}</li>

    @if($product ["discount"])
    <p class="badge bg-danger">On Sale!!!</p>
    @endif

    @endforeach

</ul>

@endsection
