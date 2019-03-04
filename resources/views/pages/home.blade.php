@extends('layouts.app')

@section('content')
<a href="address/create">Create Address</a>
@foreach ($addresses as $address)
    <a href="address/{{$address->id}}/edit"></a>

@endforeach
<a href="address/{{Auth::user()->id}}/create"></a>
@endsection
