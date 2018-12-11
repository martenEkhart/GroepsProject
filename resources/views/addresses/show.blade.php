@extends('admin.index')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            {{-- <div class="panel-heading"><a href="/" class="pull-right btn btn-default btn-xs">Go Back</a></div> --}}

            @if(count($addresses))

            @foreach ($addresses as $address)
     
 
            <div class="panel-body" style="margin-top: 20px;">
              <ul class="list-group">
                <li class="list-group-item active"><b style= "color:black"><h4 style="text-align: center">Customer Address</b></h4></li>
                
                <li class="list-group-item"><b style= "color:black"><h5>Street: </b></h5><h5> {{$address->street}}</h5></li>
                <li class="list-group-item"><b style= "color:black"><h5>House Number: </b></h5><h5> {{$address->house_number}}</h5></li>
                <li class="list-group-item"><b style= "color:black"><h5>City: </b></h5><h5> {{$address->city}}</h5></li>
                <li class="list-group-item"><b style= "color:black"><h5>Zipcode: </b></h5><h5> {{$address->zipcode}}</h5></li>
                <li class="list-group-item"><b style= "color:black"><h5>Country: </b></h5><h5> {{$address->country}}</h5></li>
                <li class="list-group-item"><b style= "color:black"><h5>Phone Number: </b></h5><h5> {{$address->phone_number}}</h5></li>
                <li style="list-style: none;" class="list-group-item list-group-item-info""><a href="/address/{{$address->id}}/edit" class="btn btn-secondary btn-lg">Edit</a>
                {!!Form::open(['action' => ['AddressesController@destroy', $address->id], 'onsubmit' => 'return confirm("Do you want to delete this Address?")', 'method' => 'DELETE', 'class' => 'float-right'])!!}
                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
                {!!Form::close()!!}</li>
            </ul>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection