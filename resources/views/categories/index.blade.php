@extends('admin.index')

@section('content')
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Latest Categories</h3></div>

                <div class="panel-body">
                    @if(count($categories))
                        <ul class="list-group">
                          @foreach($categories as $category)
                            <li class="list-group-item"><a href="/category/{{$category->id}}"><h4>{{$category->name}}</h4></a>
                                 <a href="/category/{{$category->id}}/edit" class="btn btn-secondary btn-lg" style= "float:right">Edit</a>
                            {!!Form::open(['action' => ['CategoriesController@destroy', $category->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
                         {!!Form::close()!!}
                            </li>
                            @endforeach
                        </ul>
                    @else
                      <p>No Categories Found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection