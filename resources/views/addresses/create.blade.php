
@extends('admin.index')
@section('content')
<div class="row" style="margin-top: 20px;">
    <div class="col-md-8 col-md-offset-2">
            
        <div class="panel panel-default">
            
                <div class="panel-heading"><h3>New Address</h3></div>
            <div class="panel-body" style="margin-top: 40px;>
                  
                {!!Form::open(['action' => 'AddressesController@store','method' => 'POST'])!!}

                <div class="form-group">
                {{Form::text('street','',['placeholder' => 'street', 'Class' => 'form-control'])}}
                </div>
                <div class="form-group">
                {{Form::text('house_number','',['placeholder' => 'House Number'])}}
                </div>    
                <div class="form-group">
                {{Form::text('city','',['placeholder' => 'City', 'Class' => 'form-control'])}}
                </div>    
                <div class="form-group">
                {{Form::text('zipcode','',['placeholder' => 'zipcode'])}}
                </div> 
                <div class="form-group">
                {{Form::text('country','',['placeholder' => 'Country ', 'Class' => 'form-control'])}}
                </div> 
                <div class="form-group">
                {{Form::text('phone_number ','',['placeholder' => 'Phone Number', 'Class' => 'form-control'])}}
                </div>    
                {{Form::submit('submit', ['class' => 'btn btn-primary', 'Class' => 'form-control'])}}
                {!! Form::close() !!}
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection