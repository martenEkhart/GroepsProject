@extends('layouts.app')
@section('content')

@if(count($products)) 
@foreach($products as $product)
<a href="/product/{{$product->id}}">
<div class="container">
    
<h1>{{$product->name}}</h1>
<img style="max-width:120px;" src="/product_images/{{$product->image_name}}" class="img-fluid img-thumbnail">
</a>  
<br><br>
<div>
    {{-- zorgt er voor dat je de html kan zien --}}
  
  <b> Price: €</b>{!!$product->price!!}-,<br>
  <b>Product description:</b>  {!!$product->description!!} 
</div>  
<br>
<small><b>Products in stock:</b>  {{$product->stock}} <br><b>Product Added:</b>  {{$product->created_at}} </small> 
<a href="/" class="btn btn-primary" style="margin-left:90px;">Add to Cart</a>
<hr>

    
</div>
@endforeach
@else

  <img src="images/No-Result.png">
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


@endif
@endsection