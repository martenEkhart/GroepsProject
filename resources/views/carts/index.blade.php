@extends('layouts.app')

@section('content')
<div class="row" style="margin-top: 20px;">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Winkelwagentje</h3></div>
                <div class="panel-body">
                   
                    @if(count($cart_items))

                        <ul class="list-group">
                         @foreach($cart_items as $cart_item)
                         @php

                         echo $zegeenswat[$loop->index]->amount;
                         
                         @endphp
                        <li class="list-group-item"><a href="/cart_item/{{$cart_item->id}}"><h4>{{$cart_item->name}}</h4></a><p> in Stock: {{$cart_item->stock}}</p>
                             <a href="/cart_item/{{$cart_item->id}}/edit" class="btn btn-secondary btn-lg" style= "float:right">Edit</a>
                        {!!Form::open(['action' => ['ProductsController@destroy', $cart_item->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
                        {!!Form::close()!!}
                        </li>
                        @endforeach
                    </ul>
                @else
                  <p>Your shopping cart is empty. <a href="cart_items/">Start your shopping spree!</a></p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection