@extends('admin.index')
@section('content')
<div class="row" style="margin-top: 20px;">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Create Category</h3></div>

            <div class="panel-body">
              {!!Form::open(['action' => 'CategoriesController@store','method' => 'POST'])!!}
                {{Form::text('name','',['placeholder' => 'Category Name'])}}
                {{Form::textarea('description','',['placeholder' => 'Category Description', 'class' => 'form-inline'])}}
                {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection