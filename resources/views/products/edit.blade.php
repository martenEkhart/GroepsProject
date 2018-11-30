@extends('layouts.app')
@section('content')
<div class="container">
    {!! Form::open(['action' => ['ProductsController@update', $product->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name of the product')}}

        {{ Form::text('name', $product->name , ['Class' => 'form-control', 'placeholder' => 'Product name']) }}

    </div>

    <div class="form-group">
        {{Form::label('description', 'Description of the product')}}

        {{ Form::text('description', $product->description , ['Class' => 'form-control', 'placeholder' => 'Description']) }}

    </div>

    <div class="form-group float-left">
        {{Form::label('price', 'Price of the product')}}

        {{ Form::number('price', $product->price , ['Class' => 'form-control', 'placeholder' => 'Price']) }}

    </div>

    <div class="form-group float-right">
        {{Form::label('stock', 'Amount in stock of the product')}}

        {{ Form::number('stock', $product->stock , ['Class' => 'form-control', 'placeholder' => 'Stock']) }}

    </div>
    <br>
    <br>
    <br>
    <br>
    {{-- TODO: GET catagoties from database... --}}
    <div class="form-group">
        {{Form::label('category', 'Category')}}

        {{ Form::select('category', $categories ,null, ['Class' => 'form-control', 'placeholder' => $product->category->name]) }}

    </div>

    <div class="form-group">
        {{Form::file('image_name')}}

    </div>
    

    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}
</div>

@endsection
