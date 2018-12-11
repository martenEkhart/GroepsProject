@extends('admin.index')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
                <div class="panel-heading">Edit Address</div>

            <div class="panel-body">
             {!!Form::open(['action' => ['AddressesController@update', $address->id],'method' => 'POST'])!!}
           
             {{Form::text('street',$address->street,['placeholder' => 'street'])}}
             {{Form::text('house_number',$address->house_number,['placeholder' => 'House Number'])}}
             {{Form::text('city',$address->city,['placeholder' => 'City'])}}
             {{Form::text('zipcode',$address->zipcode,['placeholder' => 'zipcode'])}}
             {{Form::text('country',$address->country,['placeholder' => 'Country'])}}
             {{Form::text('phone_number ',$address->phone_number,['placeholder' => 'Phone Number'])}}
                {{Form::hidden('_method', 'PUT')}}
                {{Form::Submit('submit')}}
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

