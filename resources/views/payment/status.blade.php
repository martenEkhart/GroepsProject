@extends('layouts.app')
@section('content')


                        <ul class="list-group">
                        <h2>Status of your order</h2>
                        <b>Order ID:</b> {{$payment->order_id}}<br>
                        <b>Payment status:</b>
                        @switch($payment->status)
                            @case(0)
                            <p class="feedback_warning">Payment open</p>
                            Something unfortunaly went wrong. Please contact support!
                            @break
                            @case(1)
                            <p class="feedback_warning">Payment cancelled</p>
                            Something unfortunaly went wrong. Please contact support!
                             @break
                            @case(2)
                            <p class="feedback_okay">Payment received!</p>
                            Thanks for shopping at Just An Affordable Webshop!<br>
                            Your payment is received and we'll start packing your order.<br>
                            You'll get an email when the order is shipped!<br>
                            @break
                            @case(5)
                            <p class="feedback_warning">Payment Expired!</p>
                            Something unfortunaly went wrong. Please contact support!
                            @break
                        @endswitch
                     
                        </li>
                    </div>
                        
                </ul>
@endsection