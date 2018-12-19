@extends('layouts.app')

@section('content')

    @include('inc.header') 
    @include('inc.searchbar')
    <br>
    @include('inc.carousel')
   
{{-- TODO: GET catagoties from database... --}}
{{-- <div class="form-group">
  {{Form::label('category', 'Category')}}

  {{ Form::select('category', $category ,null, ['Class' => 'form-control']) }}

</div> --}}

      <h3 id="hoofd">Our latest products</h3><hr>
      <div class="row" style="margin-top: 30px;">
      @if(count($products))
      @foreach($products as $product)
     
       
      <div class="col-sm" id="product">
        <div class="container"><a id="link" href="/product/{{$product->id}}"><h4>{{$product->name}}</h4>
        <img id="product-image"  src="/images/products/{{$product->image_name}}" class="img-fluid img-thumbnail"></a>
        Now: €{!!$product->price!!}-,</div><hr>
      </div>
     @endforeach
     @endif
    <div class="container" id="paginate"> {{$products->links()}}</div>   </div> 
    @yield('categories')

@endsection