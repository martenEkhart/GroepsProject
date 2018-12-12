@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::open(['action' => ['CustomisationsController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <br>
        <div class="form-group">
                {{Form::label('name2', 'Make customisations with your own images')}}

                <br>
                <br>

                {{Form::label('name', 'Give your image a name/description')}}
    
                {{ Form::text('name', '' , ['Class' => 'form-control', 'placeholder' => 'name/description']) }}
    
            </div>

        <br>
        Select image

        <div class="form-group">
            {{Form::file('image_name')}}

        </div>
        


        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

        {!! Form::close() !!}
</div>
@endsection
