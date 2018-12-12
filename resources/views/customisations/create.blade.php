@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::open(['action' => ['CustomisationsController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <br>
        <br>
        <br>
        <br>
        Select image

        <div class="form-group">
            {{Form::file('image_name')}}

        </div>
        


        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

        {!! Form::close() !!}
</div>
@endsection
