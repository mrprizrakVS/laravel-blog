@extends('layouts.header')
@section('title', 'Account')

@section('content')
<h2>Добро пожаловать, {{\Auth::user()->email}} </h2>
    <br>
    
    @if(\Auth::user()->isAdmin == 1)
    <a href="/admin">Admin panel</a><br>
    @endif
    <a href="{{route('logout')}} ">Exit</a>
    
    @endsection