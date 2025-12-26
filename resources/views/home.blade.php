<<<<<<< HEAD
@extends('layout')

@section('title', 'Pocetna stranica')



@section('content')

<p>Welcome to our home page!!!</p>

@if($realTime > 0 && $realTime < 12) <p>Good morning!</p>

    @else
    <p>Good afternoon!</p>
    @endif



    <p><strong>Current time is: {{ $realTime }}</strong></p>
    <p><strong>Current date is: {{ $realDate }}</strong></p>

    @endsection
=======
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
</head>

<body>
    <h1>Welcome to the Home Page</h1>
</body>

</html>
>>>>>>> 8d3a7e5bd4bd47c057e4a2248e0e5784ab860923
