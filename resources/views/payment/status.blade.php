@extends('layouts.app')
@section('content')


                        <ul class="list-group">
                            {{$payment->order_id}}
                         {{-- @foreach($payments as $payment)
                         <div class="for-wrapper">
                        <b>Order id:</b>
                        {{$payment->order_id}}
                        <b>Payment status:</b><br>
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
                             --}}
                        @endswitch
                     
                        </li>
                    </div>
                        @endforeach
                </ul>
@endsection