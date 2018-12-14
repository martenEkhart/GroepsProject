@extends('layouts.app')
@section('content')


                        <ul class="list-group">
                       
                         @foreach($payments as $payment)
                         <div class="for-wrapper">
                        <b>Order id:</b>
                        {{$payment->order_id}}
                        <b>Payment status:</b><br>
                         @switch($payment->status)
                            @case(0)
                                Payment open
                            @break
                            @case(1)
                                Payment cancelled
                             @break
                            @case(2)
                                Payment received!
                                @break
                            @default
                        @endswitch
                     
                        </li>
                    </div>
                        @endforeach
                </ul>
@endsection