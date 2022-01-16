@extends('layouts.app')
@section('content')

<h1> salut {{auth()->user()->name }} </h1>
@foreach (auth()->user()->likes as $like)
    {{ $like->title }}
@endforeach
@endsection