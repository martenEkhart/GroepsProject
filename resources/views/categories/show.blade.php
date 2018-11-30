@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><a href="/" class="pull-right btn btn-default btn-xs">Go Back</a></div>

            <div class="panel-body">
              <ul class="list-group">
                <li class="list-group-item active"><b style= "color:black"><h3>Category:  {{$category->name}}</b></h3></li>
              </ul>
              {{-- <hr> --}}
              <div class="card"><b><h3>Category Description:</h3>
                <h4>{{$category->description}}</h4></b>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection