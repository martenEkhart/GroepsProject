@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::open(['action' => ['CustomisationsController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('x', 'x-coordinaat')}}

            {{ Form::number('x', '' , ['Class' => 'form-control', 'placeholder' => '0']) }}

        </div>

        <div class="form-group">
            {{Form::label('y', 'y-coordinaat')}}

            {{ Form::number('y', '' , ['Class' => 'form-control', 'placeholder' => '0']) }}

        </div>

        <div class="form-group float-left">
            {{Form::label('width', 'width')}}

            {{ Form::number('width', '' , ['Class' => 'form-control', 'placeholder' => '200']) }}

        </div>

        <div class="form-group float-right">
            {{Form::label('height', 'height')}}

            {{ Form::number('height', '' , ['Class' => 'form-control', 'placeholder' => '200']) }}

        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="form-group">
            {{Form::label('opacity', 'opacity')}}

            {{ Form::number('opacity', '' , ['Class' => 'form-control', 'placeholder' => '1']) }}

        </div>

       
        
        <div class="form-group">
            {{Form::label('opacity', 'opacity')}}

            {{ Form::number('opacity', '' , ['Class' => 'form-control', 'placeholder' => '1']) }}

            {{ Form::selectRange('x', 0, 30) }}

        </div>



        <div class="form-group">
            {{Form::file('image_name')}}

        </div>
        


        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

        {!! Form::close() !!}
</div>
@endsection
