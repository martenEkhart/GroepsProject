@extends('layouts.app')
@section('content')


                        <ul class="list-group">
                         @foreach($payments as $payment)
                         <div class="for-wrapper">
                        Order id:
                        {{$payment->order_id}}
                        Payment status:
                        {{$payment->status}}

                        </li>
                    </div>
                        @endforeach
@endsection