@extends('layouts.app')
@section('content')
<a href="/customisation/manage" target="_parent"><button>Manage your customisations</button></a>

<div class="container">
        {!! Form::open(['action' => ['CustomisationsController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <br>
        <br>
                <div class="form-group">
                {{Form::label('name2', 'Make a new customisation')}}


                <br>

                {{Form::label('name', 'Give your image a name/description')}}
    
                {{ Form::text('name', '' , ['Class' => 'form-control', 'placeholder' => 'name/description']) }}
    
            </div>

  
        Select image

        <div class="form-group">
            {{Form::file('image_name')}}

        </div>

        
        


        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

        {!! Form::close() !!}
</div>
@endsection
