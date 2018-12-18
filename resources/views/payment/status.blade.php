@extends('layouts.app')
@section('content')


                        <ul class="list-group">
                        <b>Order ID:</b> {{$payment->order_id}}<br>
                        <b>Payment status:</b>
                        @switch($payment->status)
                            @case(0)
                            <p class="feedback_warning">Payment open</p>
                            @break
                            @case(1)
                            <p class="feedback_warning">Payment cancelled</p>
                             @break
                            @case(2)
                            <p class="feedback_okay">Payment received!</p>
                            @break
                            @case(5)
                            <p class="feedback_warning">Payment Expired!</p>
                            @break
                        @endswitch
                     
                        </li>
                    </div>
                        
                </ul>
@endsection