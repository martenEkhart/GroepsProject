
@extends('layouts.app')
@section('content')


@if(count($products)) 
@foreach($products as $product)
<a href="/product/{{$product->id}}">
<div class="container">
    
<h1>{{$product->name}}</h1>
<img style="width:10%" src="/product_images/{{$product->image_name}}">
</a>  
<br><br>
<div>
    {{-- zorgt er voor dat je de html kan zien --}}
  <b> Price: $</b>{!!$product->price!!}-,<br>
  <b>Product description:</b>  {!!$product->description!!} 
</div>  
<br>
<small><b>Products in stock:</b>  {{$product->stock}} <br><b>Product Added:</b>  {{$product->created_at}} </small> 
<a href="/" class="btn btn-primary" style="margin-left:90px;">Add to Card</a>
<hr>

    
</div>
@endforeach
@endif
@endsection