<?php

namespace App\Http\Controllers;

use Mollie;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct()
{
    $this->payment = Mollie::api()->payments();
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
echo "test";
    $payment = Mollie::api()->payments()->get($request->id);

    if($payment->isPaid()) {
       echo "hietsrdsfsd";
    }
}

}
