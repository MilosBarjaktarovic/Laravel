<<<<<<< HEAD
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
=======
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
</head>

<body>
    <h1>Welcome to the Shop</h1>
    <p>Browse our collection of products and enjoy shopping!</p>
</body>

</html>
>>>>>>> 8d3a7e5bd4bd47c057e4a2248e0e5784ab860923
