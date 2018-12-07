
@extends('layouts.app')

@section('content')

{{-- 
<div class="col-md 6" style="margin-top: 20px;">
        <form action="/search" method="get">
          <div class="form-group">
              <input type="search" name="search" class="form-control">
              <span class="form-group-btn">
                  <button type="submit" class="btn btn-primary">Search</button>
              </span>
          </div>
        </form>
      </div> --}}
        


<div class="row" style="margin-top: 20px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Latest Catagories</h3></div>
                    <div class="panel-body">
                        @if(count($products))
                            <ul class="list-group">
                             @foreach($products as $product)
                            <li class="list-group-item"><a href="/product/{{$product->id}}"><h4>{{$product->name}}</h4></a><p> in Stock: {{$product->stock}}</p>
                                 <a href="/product/{{$product->id}}/edit" class="btn btn-secondary btn-lg" style= "float:right">Edit</a>
                            {!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
                            {!!Form::close()!!}
                            </li>
                            @endforeach
                        </ul>
                    @else
                      <p>No Products Found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
