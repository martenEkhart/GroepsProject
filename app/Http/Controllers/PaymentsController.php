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

    public function preparePayment(Request $request)
{
    // Amount & description uit Order Table halen!
    
    
    $payment = Mollie::api()->payments()->create([
    'amount' => [
        'currency' => 'EUR',
        'value' => '9.95', // You must send the correct number of decimals, thus we enforce the use of strings
    ],
    'description' => 'My first API payment',
    'metadata' =>  $request->order_id,
    'webhookUrl' => route('webhooks.mollie'),
    'redirectUrl' => route('order.success'),
    ]);

    $payment = Mollie::api()->payments()->get($payment->id);
// print_r ($payment);
    // redirect customer to Mollie checkout page
    return redirect($payment->getCheckoutUrl(), 303);
}



public function handle(Request $request) {
    // Handles webhookfeedback from Mollie
    if (! $request->has('id')) {
        // do something here when there is no id in the request
        return;
    }


    $payment = Mollie::api()->payments()->get($request->id);
    $order_id = $payment->metadata;
    $currency = $payment->amount->currency;
    $amount = $payment->amount->value;
    $method = $payment->method;
    
    // Save data from Mollie to db: 
    $payment_to_db = new Payment();
    $payment_to_db->mollie_id = $request->id;
    $payment_to_db->order_id = $order_id;
    $payment_to_db->currency = $currency;
    $payment_to_db->amount = $amount;
    $payment_to_db->method = $method;
    $payment_to_db->save();
    // Get payment status from Mollie and determine what to do
    
    // switch oid van maken?? + hoe dit terugkoppelen naar de gebruiker? view of views?:
     if ($payment->isPaid())
     {
        $payment_status = Payment::where('mollie_id',$request->id)->first();
        $payment_status->status = '2'; // paid
        $payment_status->save();
     }
     else if ($payment->isOpen())
     {
        $payment_status = Payment::where('mollie_id',$request->id)->first();
        $payment_status->status = '0'; // open
        $payment_status->save();
     }
     else if ($payment->isCanceled())
     {
        $payment_status = Payment::where('mollie_id',$request->id)->first();
        $payment_status->status = '1'; // canceled
        $payment_status->save();
     }
     else if ($payment->isPending())
     {
        $payment_status = Payment::where('mollie_id',$request->id)->first();
        $payment_status->status = '3'; // pending
        $payment_status->save();
     }
     else if ($payment->isAuthorized())
     {
        $payment_status = Payment::where('mollie_id',$request->id)->first();
        $payment_status->status = '4'; // Authorized
        $payment_status->save();
     }
     else if ($payment->isExpired())
     {
        $payment_status = Payment::where('mollie_id',$request->id)->first();
        $payment_status->status = '5'; // Expired
        $payment_status->save();
     }
     else if ($payment->isFailed())
     {
        $payment_status = Payment::where('mollie_id',$request->id)->first();
        $payment_status->status = '6'; // Failed
        $payment_status->save();
     }
     else {
         // error, geen status terug gekregen van Mollie. What to do?
     }

     




}

}
