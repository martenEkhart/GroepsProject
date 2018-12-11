
@extends('layouts.app')

@section('content')

  


<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Latest Products</h3></div>
                    <div class="panel-body" style="margin-top: 100px;">
                        @if(count($products))
                            <ul class="list-group">
                             @foreach($products as $product)
                            <li class="list-group-item"><a href="/product/{{$product->id}}"><h3>{{$product->name}} 
                           <div> <img style="max-width:100px;" src="/product_images/{{$product->image_name}}" class="img-fluid img-thumbnail"></h3></a>
                                @if(!Auth::guest())
                                @if(Auth::user()->authorization_level != 1)
    
                                    @else
                                 <a href="/product/{{$product->id}}/edit" class="btn btn-secondary btn-lg" style= "float:right">Edit</a>
                            {!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'onsubmit' => 'return confirm("Do you want to delete this Product?")', 'method' => 'POST', 'class' => 'float-right'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
                            {!!Form::close()!!}
                            @endif
                            @endif
                            </li>
                            @endforeach
                        </ul></div>
                    @else
                      <p>No Products Found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
