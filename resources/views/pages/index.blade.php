@extends('layouts.app')

@section('content')

    @include('inc.header') 
    @include('inc.searchbar')
    <br>
    @include('inc.carousel')
    @include('inc.showcase')
    @yield('categories')

@endsection