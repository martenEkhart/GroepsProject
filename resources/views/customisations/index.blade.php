@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Products</h1>
    @if(count($customisations) > 0)
        @foreach($customisations as $customisation)
            <div class="row">
            <a href="/customisation/{{$customisation->id}}">{{$customisation->name}}</a>
            </div>

        @endforeach
    @endif

</div>

@endsection
