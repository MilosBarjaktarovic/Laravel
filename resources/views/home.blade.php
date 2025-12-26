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
