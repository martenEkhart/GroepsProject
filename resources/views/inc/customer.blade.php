@extends('layouts.app')
@section('content')
<div class="container">
  <div class="col-md 6" style="margin-top: 20px;">
    <form action="/search" method="get">
      <div class="row">
            <span class="form-group-btn">
                    <button type="submit" class="btn btn-primary" style="width:110px;"><b>Search</b></button>
                </span>
          <input required type="search" name="search" class="form-control" placeholder="Search Products" style="width: 70%;">
          
      </div>
    </form>
  </div>
@if(count($products)) 
@foreach($products as $product)
<a id="link" href="/product/{{$product->id}}">
<h1 style="margin-top: 30px;">{{$product->name}}</h1>
<img style="max-width:120px;" src="/images/products/{{$product->image_name}}" class="img-fluid img-thumbnail">

<br><br>

    {{-- zorgt er voor dat je de html kan zien --}}
  
  <b> Price: €</b>{!!$product->price!!}-,<br>
  <b>Product description:</b>  {!!$product->description!!} 
  
<br>
<small><b>Products in stock:</b>  {{$product->stock}} <br><b>Product Added:</b>  {{$product->created_at}} </small> </a>  
<a href="/" class="btn btn-primary" style="margin-left:90px;">Add to Cart</a>
<hr>
 
    

@endforeach
@else

  <img style="margin-top:20px;" src="images/No-Result.png">



@endif
<div class="container" id="paginate"> {{$products->links()}}</div> 
@endsection