@extends('layouts.app')
@section('content')

@if(count($products)) 
@foreach($products as $product)
<h1>{{$product->name}}</h1>
<img style="width:10%" src="/product_images/{{$product->image_name}}">
<br><br>
<div>
    {{-- zorgt er voor dat je de html kan zien --}}
    {!!$product->description!!} 
</div>  
<hr>
<small>Written on {{$product->created_at}} in {{$product->stock}}</small> 
@endforeach
@endif
@endsection