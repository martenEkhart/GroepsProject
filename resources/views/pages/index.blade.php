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
    <div id="products-container">

    <script>  
      var cim = [];        
      var customisations = {!! json_encode($customisations->toArray()) !!};
      for(i=0; i<customisations.length; i++) {
        createImg(i);
      }
    
    
      function createImg(nr) {
        c = customisations[nr];
        cim[nr] = document.createElement('img');
        if (c.watermark_style) {
          cim[nr].style.position = "fixed";
        } else {
          cim[nr].style.position = "absolute";
        }
        
        cim[nr].src = "../images/customisations/" + c.image_name;
        cim[nr].style.left = Math.round(c.x/10000*window.innerWidth) +  "px";
        cim[nr].style.top = Math.round(c.y/10000*window.innerHeight) +  "px";
        var fac1 = 2.8;
        cim[nr].height = c.height*fac1;
        cim[nr].width = c.width*fac1;
        cim[nr].style.zIndex = c.z_layer-100;
        cim[nr].style.opacity = c.opacity/100;
        cim[nr].style.userSelect = "none";
        document.body.appendChild(cim[nr]);
      }
    
      
        </script>

@endsection