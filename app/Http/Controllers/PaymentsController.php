<?php

namespace App\Http\Controllers;

use Mollie;
use App\Product; 
use App\Category; 
use App\Payment;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{

    public function __construct()
{
    
}

    public function preparePayment()
{
    $payment = Mollie::api()->payments()->create([
    'amount' => [
        'currency' => 'EUR',
        'value' => '9.95', // You must send the correct number of decimals, thus we enforce the use of strings
    ],
    'description' => 'My first API payment',
    'webhookUrl' => route('webhooks.mollie'),
    'redirectUrl' => route('order.success'),
    ]);

    $payment = Mollie::api()->payments()->get($payment->id);
// print_r ($payment);
    // redirect customer to Mollie checkout page
    return redirect($payment->getCheckoutUrl(), 303);
}

public function testPayment(Request $request)
{   
    error_log($request);
    echo "hoi";
    die();
    // $payment = Mollie::api()->payments()->get($payment->id);

    if ($payment->isPaid())
    {
        echo "Payment received.";
        // Do your thing ...
    }
}

public function statusPayment(Request $request)
{   
    print_r ($request->id);
    echo "hoi";

    die();
    // $payment = Mollie::api()->payments()->get($payment->id);

    if ($payment->isPaid())
    {
        echo "Payment received.";
        // Do your thing ...
    }
}

public function handle(Request $request) {
    if (! $request->has('id')) {
        echo "test";
        return;
    }


 
     $payment_to_db = new Payment();
     $payment_to_db->mollie_id = $request->id;
     $payment_to_db->save();

     $payment = Mollie::api()->payments()->get($request->id);
     if ($payment->isPaid())
     {
        $payment_status = Payment::where('mollie_id',$request->id)->first();
        $payment_status->status = '2';
        $payment_status->save();
     }

     if ($payment->isOpen())
     {
        $payment_status = Payment::where('mollie_id',$request->id)->first();
        $payment_status->status = '0';
        $payment_status->save();
     }
     if ($payment->isCanceled())
     {
        $payment_status = Payment::where('mollie_id',$request->id)->first();
        $payment_status->status = '1';
        $payment_status->save();
     }

}

}
