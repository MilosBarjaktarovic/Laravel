@extends('layout')

@section('title')

Glavna stranica

@endsection

@section('content')

<p>Real time: {{ date('h:i:s') }} </p>

@endsection
