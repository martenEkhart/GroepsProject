@extends('layouts.app')
@section('content')
<div class="container">
    
<h1>{{$product->name}}</h1>
<img style="max-width:200px;" src="/images/products/{{$product->image_name}}" class="img-fluid img-thumbnail">
 
<br><br>
<div>
    {{-- zorgt er voor dat je de html kan zien --}}
  
  <b> Price: €</b>{!!$product->price!!}-,<br>
  <b>Product description:</b>  {!!$product->description!!} 
</div>  
<br>
@if(Auth::guest())
@php $user_id = "0"; @endphp
@else
@php $user_id = Auth::user()->id; @endphp
@endif
<small><b>Products in stock:</b>  {{$product->stock}} <br><b>Product Added:</b>  {{$product->created_at}} </small> 
<a href="/cart/{{$user_id}}/add/{{$product->id}}" class="btn btn-primary" style="margin-left:90px;">Add to Cart</a>
<hr>

    
</div>
    @if(!Auth::guest())
    @if(Auth::user()->authorization_level != 1)
    
    @else
   <a href="/product/{{$product->id}}/edit" class="btn btn-primary">Edit</a>

{!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'onsubmit' => 
'return confirm("Do you want to delete this Product?")', 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}

@endif
@endif
@endsection
