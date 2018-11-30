@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Create Category<a href="/" class="pull-right btn btn-default btn-sm" style= "float:right">Go Back</a></div>

            <div class="panel-body">
              {!!Form::open(['action' => 'CategoriesController@store','method' => 'POST'])!!}
                {{Form::text('name','',['placeholder' => 'Category Name'])}}
                {{Form::textarea('description','',['placeholder' => 'Category Description'])}}
                {{Form::submit('submit')}}
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection