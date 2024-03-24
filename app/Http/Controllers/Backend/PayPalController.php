<?php

namespace App\Http\Controllers\Backend;

use App\Models\Application;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaypalController extends Controller
{
    public function paypal(Request $request)
    {
        // dd($request->all());
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->price
                    ]
                ]
            ]
        ]);
        // dd($response);
        if(isset($response['id']) && $response['id']!=null) {
            foreach($response['links'] as $link) {
                if($link['rel'] === 'approve') {
                    session()->put('reference_id', $request->reference_id);
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('paypal.cancel');
        }
    }
    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if(isset($response['status']) && $response['status'] == 'COMPLETED') {

            // Insert data into database
            $payment = new Transaction;

            $payment->reference_id = session()->get('reference_id');
            $payment->transaction_id = $response['purchase_units'][0]['payments']['captures'][0]['id'];
            $payment->amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $payment->currency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $payment->payer_name = $response['payer']['name']['given_name'] . " " . $response['payer']['name']['surname'];
            $payment->payer_email = $response['payer']['email_address'];
            $payment->payment_status = $response['status'];
            $payment->payment_method = "PayPal";
            $payment->save();

            $applications = Application::where('reference_id', session()->get('reference_id'))->get();
            foreach ($applications as $application) {

                $application->is_payment = 1;
                $application->transaction_id = $payment->id;

                $application->save();
            }

            return redirect()->route('invoice', $payment->reference_id);

            unset($_SESSION['reference_id']);


        } else {
            return redirect()->route('paypal.cancel');
        }
    }
    public function cancel()
    {
        return "Payment is cancelled.";
    }
}

