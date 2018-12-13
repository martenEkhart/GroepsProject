@extends('layouts.app')

@section('content')

    @include('inc.header') 
    @include('inc.searchbar')
    <br>
    @include('inc.carousel')
    
      <h3 id="hoofd"><b>Our latest products</b></h3>
      <div class="row" style="margin-top: 30px;">
      @if(count($products))
      @foreach($products as $product)
     
       
      <div class="col-sm" id="product">
        <div class="container"><a id="link" href="/product/{{$product->id}}"><h5><b>{{$product->name}}</b></h5>
        <img id="product-image"  src="/images/products/{{$product->image_name}}" class="img-fluid img-thumbnail"></a>
        <b>Price: €</b>{!!$product->price!!}-,</div>
      </div>
     @endforeach
     @endif
    <div class="container" id="paginate"> {{$products->links()}}</div>   </div> 
    @yield('categories')

@endsection