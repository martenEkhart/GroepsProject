@extends('admin.index')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            {{-- <div class="panel-heading"><a href="/" class="pull-right btn btn-default btn-xs">Go Back</a></div> --}}

            <div class="panel-body" style="margin-top: 20px;">
              <ul class="list-group">
                <li class="list-group-item active"><b style= "color:black"><h3 style="text-align: center">Category-{{$category->name}}</b></h3></li>
                <li class="list-group-item"><b style= "color:black"><h4>Category Description: </b></h4><h5> {{$category->description}}</h5></li>
              </ul>
              {{-- <hr> --}}
              {{-- <div class="card"><b><h4>Category Description:</h4>
                <h5>{{$category->description}}</h5></b>
              </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection