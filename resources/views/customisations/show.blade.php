@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$customisation->name}}</h1>
    <img src="/storage/customisation_images/{{$customisation->image_name}}" alt="customisation image">
    <div>
        Y: {{$customisation->y}}
    </div>
    <div>
        Opacity: {{$customisation->opacity}}
    </div>
    <div>
        Z layer: {{$customisation->z_layer}}
    </div>
    <div>
        Visible: {{$customisation->visible}}
    </div>
<a href="/customisation/{{$customisation->id}}/edit" class="btn btn-primary">Edit</a>

{!!Form::open(['action' => ['CustomisationController@destroy', $customisation->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}

</div>

@endsection
