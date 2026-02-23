@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

@include('nav')

<h1>Welcome Page</h1>
<p>This page uses Blade Layout.</p>

@php
    $name = "Andrey";
    $skills = ['PHP', 'Laravel', 'Go'];
@endphp

@if($name)
    <p><b>Name:</b> {{ $name }}</p>
@endif

<p><b>Skills:</b></p>
<div>
    @foreach($skills as $s)
        <span class="tag">{{ $s }}</span>
    @endforeach
</div>

@endsection