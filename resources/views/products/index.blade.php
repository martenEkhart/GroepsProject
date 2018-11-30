@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Products</h1>
    @if(count($products) > 0)
        @foreach($products as $product)
            <div class="row">
            <a href="/product/{{$product->id}}">{{$product->name}}</a>
            </div>

        @endforeach
    @endif

</div>

@endsection
