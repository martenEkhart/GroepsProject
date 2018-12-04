@extends('admin.index')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
                <div class="panel-heading">Edit Category <a href="/" class="pull-right btn btn-default btn-sm" style= "float:right">Go Back</a></div>

            <div class="panel-body">
             {!!Form::open(['action' => ['CategoriesController@update', $category->id],'method' => 'POST'])!!}
              {{Form::text('name',$category->name,['placeholder' => 'Category'])}}
              {{Form::textarea('description',$category->description,['placeholder' => 'Category Description'])}}
                {{Form::hidden('_method', 'PUT')}}
                {{Form::Submit('submit')}}
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection