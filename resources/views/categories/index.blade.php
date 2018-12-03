@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Latest Catagories</div>

                <div class="panel-body">
                    @if(count($categories))
                        <ul class="list-group">
                          @foreach($categories as $category)
                            <li class="list-group-item"><a href="/category/{{$category->id}}">{{$category->name}}</a> <a href="/category/{{$category->id}}/edit" class="pull-right btn btn-default btn-sm" style= "float:right">Edit</a></li>
                            {!!Form::open(['action' => ['CategoriesController@destroy', $category->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                         {!!Form::close()!!}
                         
                            @endforeach
                        </ul>
                    @else
                      <p>No Catagories Found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection