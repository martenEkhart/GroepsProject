@extends('layouts.custom')
@section('content')
<a href="/customisation/manage" target="_parent"><button class="box ">Go to your customisations</button></a>

<div class="container">
        {!! Form::open(['action' => ['CustomisationsController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <br>
        <br>
                <div class="form-group">
                        <br>
                <h2>Make a new customisation</h2>

               
    
                {{ Form::text('name', '' , ['Class' => 'form-control', 'placeholder' => 'name/description']) }}
                {{Form::label('fixed','watermark style')}}         

                {{ Form::checkbox('fixed', 'fixed', true) }}
    
    
            </div>

        Select image

        <div class="form-group">
            {{Form::file('image_name', ['class'=>'btn btn-primary'])}}

        </div>

        
        


        {{Form::submit('Submit', ['class'=>'btn  btn-lg btn-primary'])}}

        {!! Form::close() !!}

        @if(count($customisations) > 0)            

            @foreach($customisations as $customisation)
                <a href="/customisation/manage/{{$customisation}}">{{$customisation}}</a><br>
            @endforeach
        @endif

</div>
@endsection
